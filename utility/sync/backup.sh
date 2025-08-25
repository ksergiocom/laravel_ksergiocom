#!/bin/bash

# --- Cargar credenciales básicas ---

DIR_SCRIPT="$(cd "$(dirname "$0")" && pwd)"

source "$DIR_SCRIPT/.conf"  # solo datos no sensibles: HOST, USER, DB nombres, etc.


# --- Sincronizar ficheros ---
read -r -s -p "Introduce la contraseña SSH para $SSH_USER@$HOST:" SSH_PASSWORD
echo

if [ ! -d "$DIR_DESTINO" ]
then
    echo "El directorio de destino no existe"
    exit 1
fi

if ! ssh "$SSH_USER@$HOST" "[ -d '$DIR_ORIGEN' ]"
then
    echo "El directorio de origen remoto no existe"
    exit 1
fi

# Descomentar si deseamos borrar el contenido previo
# rm -rf "${DIR_DESTINO:?}/"*

echo "Copiando ficheros del servidor..."
sshpass -p "$SSH_PASSWORD" scp -r "$SSH_USER@$HOST:$DIR_ORIGEN/"* "$DIR_DESTINO/"
echo "Ficheros copiados con éxito"

# --- Sincronizar base de datos ---
DUMP_FILE="$DIR_SCRIPT/temp_dump.sql"

read -r -s -p "Introduce la contraseña MySQL para $MYSQL_USER@$HOST:" MYSQL_PWD_REMOTA
echo
read -r -s -p "Introduce la contraseña MySQL local para $MYSQL_LOCAL_USER@127.0.0.1:" MYSQL_PWD_LOCAL
echo

export MYSQL_PWD="$MYSQL_PWD_REMOTA"
echo "Creando fichero de respaldo de la base de datos..."
mysqldump -h "$HOST" -u "$MYSQL_REMOTE_USER" "$DB_ORIGEN" > "$DUMP_FILE"
echo "Creado fichero de respaldo con éxito"
unset MYSQL_PWD


export MYSQL_PWD="$MYSQL_PWD_LOCAL"
echo "Sincronizando la base de datos local..."
mysql -h 127.0.0.1 -P 3306 -u "$MYSQL_LOCAL_USER" "$DB_DESTINO" < "$DUMP_FILE"
echo "Sincronizado con éxito"
unset MYSQL_PWD

rm -f "$DUMP_FILE"

echo "¡Archivos y base de datos sincronizados con éxito!"