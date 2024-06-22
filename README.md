# Kypo CRP - Escenario de Hacking Web

## Descripción del Escenario

Este escenario de Kypo CRP está diseñado para entrenar habilidades de hacking web mediante la simulación de un ataque dirigido a una aplicación web vulnerable. Los participantes seguirán un flujo de ataque que incluye escaneo de red, fuerza bruta en un formulario de login y un ataque XSS para obtener cookies de la víctima.

## Flujo del Escenario

1. **Escaneo de Red** 
   - Los participantes realizarán un escaneo de la red para identificar los servicios y aplicaciones web disponibles.

2. **Ataque de Fuerza Bruta**
   - El escaneo revelará una aplicación web con un formulario de login vulnerable. Los participantes intentarán varias combinaciones de usuario y contraseña para obtener acceso.

3. **Ataque XSS en el Foro**
   - Una vez autenticados, los participantes accederán a un foro dentro de la aplicación web. El foro es vulnerable a un ataque XSS (Cross-Site Scripting). Los participantes inyectarán código malicioso para robar la cookie de sesión de otro usuario.

## Requisitos

- Kypo Cyber Range Platform (CRP)
- Conocimientos básicos de escaneo de red, fuerza bruta y ataques XSS
- Herramientas de escaneo como Nmap
- Herramientas para fuerza bruta como Hydra o Burp Suite
- Navegador web

## Objetivos de Aprendizaje

- Realizar un escaneo de red para identificar aplicaciones y servicios web.
- Ejecutar un ataque de fuerza bruta en formularios de login.
- Detectar y explotar vulnerabilidades XSS en aplicaciones web.
- Comprender las implicaciones de seguridad de ataques de fuerza bruta y XSS.

## Advertencias y Consejos de Seguridad

- Este escenario es para fines educativos únicamente. No intentes replicar estos ataques en sistemas no autorizados.
- Asegúrate de tener permiso explícito para realizar pruebas de penetración en cualquier sistema que no sea parte del escenario de entrenamiento.
