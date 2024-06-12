from selenium import webdriver
import time
import sys

# URL de inicio de sesión
login_url = 'http://10.1.26.9:4789/index.php?action=login'

# Datos del formulario de inicio de sesión
username = 'Elon_Musk'
password = 'nngjret58h'

# URL de foro restringido
foro_url = 'http://10.1.26.9:4789/index.php?action=foro'

# Configurar las opciones del navegador
options = webdriver.FirefoxOptions()

# Iniciar sin interfaz gráfica
options.add_argument("-headless")

# Iniciar el navegador Firefox
driver = webdriver.Firefox(options=options)

# Realizar el inicio de sesión
driver.get(login_url)
driver.find_element_by_id('username').send_keys(username)
driver.find_element_by_id('password').send_keys(password)
driver.find_element_by_id('login_button').click()

# Esperar a que la sesión se establezca
time.sleep(5)

# Obtener y mostrar las cookies
cookies = driver.get_cookies()
for cookie in cookies:
    print(cookie)
    sys.stdout.flush()

# Bucle infinito para realizar solicitudes periódicas
while True:
    # Acceder a la página restringida después del inicio de sesión
    driver.get(foro_url)

    # Esperar 30 segundos antes de realizar la próxima solicitud
    time.sleep(30)

# Cerrar el navegador al finalizar
driver.quit()
