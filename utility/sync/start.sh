#!/bin/bash

set -euo pipefail  # Sale al primer error, variables no definidas y fallos en pipes

# Función para imprimir errores
error_exit() {
    echo "ERROR: $1" >&2
    exit 1
}

# Ruta al directorio donde está el script
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

# Cargar variables de configuración
CONF_FILE="$SCRIPT_DIR/.conf"
[ -f "$CONF_FILE" ] || error_exit "No se encontró el fichero de configuración: $CONF_FILE"
source "$CONF_FILE"

# Pedir contraseña una sola vez (no se muestra al escribirla)
read -r -s -p "Introduce la contraseña: " PASSWORD
echo ""  # salto de línea después del prompt

# Carpeta local de destino
LOCAL_PUBLIC_DIR="$SCRIPT_DIR/../../storage/app/public"

# Carpeta remota que quieres copiar
REMOTE_PUBLIC_DIR="$REMOTE_DIR"

# Comprobar existencia de la carpeta local
[ -d "$LOCAL_PUBLIC_DIR" ] || error_exit "No existe la carpeta local: $LOCAL_PUBLIC_DIR"

echo "Eliminando contenido antiguo de $LOCAL_PUBLIC_DIR..."
rm -rf "$LOCAL_PUBLIC_DIR"/* || error_exit "No se pudo eliminar el contenido antiguo"
echo "Contenido antiguo eliminado."

# Comprobar existencia de la carpeta remota antes de copiar
ssh "$USER@$HOST" "[ -d '$REMOTE_PUBLIC_DIR' ]" || error_exit "No existe la carpeta remota: $REMOTE_PUBLIC_DIR"

echo "Copiando archivos del remoto $REMOTE_PUBLIC_DIR a $LOCAL_PUBLIC_DIR..."
scp -r "$USER@$HOST:$REMOTE_PUBLIC_DIR/"* "$LOCAL_PUBLIC_DIR/" || error_exit "Fallo al copiar archivos remotos"
echo "Archivos copiados."

# --- Volcar la base de datos del origen en destino ---
DUMP_FILE="$SCRIPT_DIR/dump_$(date '+%Y%m%d_%H%M%S').sql"

echo "Realizando dump de la base de datos remota..."
mysqldump -h "$HOST" -u "$USER" -p"$PASSWORD" "$DB_NAME" > "$DUMP_FILE" || error_exit "Fallo al realizar dump remoto"

echo "Importando dump a la base de datos local..."
mysql -h 127.0.0.1 -P 3306 -u "root" -p"root" "$DB_NAME" < "$DUMP_FILE" || error_exit "Fallo al importar dump local"

# Borra el archivo dump temporal
rm "$DUMP_FILE"

echo "Base de datos sincronizada con éxito!"
