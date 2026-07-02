## ¿Qué es una sentencia preparada y por qué previene la inyección SQL?

Una sentencia preparada es cuando primero le decimos a la base de datos
la estructura de la consulta (con signos de interrogación como espacios
para los datos), y después le mandamos los valores aparte con execute().
Así la base de datos nunca mezcla el código de la consulta con los datos
que el usuario escribió, entonces aunque alguien intente meter algo como
'; DROP TABLE productos; -- en un campo, eso solo se va a tratar como
texto normal y no como una instrucción SQL.
