# GoodBooks - Plataforma de Reseñas de Libros

GoodBooks es una plataforma donde los usuarios pueden reseñar, descubrir y explorar libros que sean de su interes.

GoodBooks ofrece la posibilidad de crearse un usuario para vivir toda esta experiencia


## Dataset

Los datasets para complementar el analisis los saque de [Kaggle](https://www.kaggle.com/datasets/mohamedbakhet/amazon-books-reviews)

## Tecnologías Utilizadas

* HTML + Tailwind CSS
* PHP
* MySQL

## Base de Datos

### Creación de Tablas

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE libros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  authors TEXT,
  image TEXT,
  previewLink TEXT,
  publisher TEXT,
  publishedDate VARCHAR(20),
  infoLink TEXT,
  categories TEXT,
  ratingsCount INT
);

CREATE TABLE reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  libro_id INT,
  title VARCHAR(255),
  price DECIMAL(10,2),
  profileName VARCHAR(255),
  review_score DECIMAL(2,1),
  review_summary TEXT,
  review_text TEXT,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (libro_id) REFERENCES libros(id)
);
```

### Inserción de Libros de Ejemplo

```sql
INSERT INTO libros (title, description, authors, image, previewLink, publisher, publishedDate, infoLink, categories, ratingsCount) VALUES
('Its Only Art If Its Well Hung!', 'Unknown', '["Julie Strain"]', 'http://books.google.com/books/content?id=DykPAAAACAAJ', 'http://books.google.nl/books?id=DykPAAAACAAJ', 'Unknown', '1996', 'http://books.google.nl/books?id=DykPAAAACAAJ', '["Comics & Graphic Novels"]', NULL),

('Dr. Seuss: American Icon', 'Philip Nel takes a fascinating look into the key moments...', '["Philip Nel"]', 'http://books.google.com/books/content?id=IjvHQsCn_pgC', 'http://books.google.nl/books?id=IjvHQsCn_pgC', 'A&C Black', '2005-01-01', 'http://books.google.nl/books?id=IjvHQsCn_pgC', '["Biography & Autobiography"]', NULL),

('Wonderful Worship in Smaller Churches', 'This resource includes twelve principles...', '["David R. Ray"]', 'http://books.google.com/books/content?id=2tsDAAAACAAJ', 'http://books.google.nl/books?id=2tsDAAAACAAJ', 'Unknown', '2000', 'http://books.google.nl/books?id=2tsDAAAACAAJ', '["Religion"]', NULL);
```

### Inserción de Usuario de Prueba

```sql
INSERT INTO usuarios (nombre_usuario, contrasena)
VALUES ('tadeo', SHA2('contrasena123', 256));
```

### Inserción de Reseña de Ejemplo

```sql
INSERT INTO reviews (usuario_id, libro_id, title, price, profileName, review_score, review_summary, review_text)
VALUES (1, 1, 'Its Only Art If Its Well Hung!', 12.99, 'tadeo', 4.5, 'Interesante perspectiva', 'Me gustó mucho la narrativa y el estilo.');
```

## 🔐 Funcionalidades Implementadas

### 🔑 Autenticación y Seguridad
- Registro de usuarios únicos con **contraseñas hasheadas** (`password_hash`)
- Login con verificación segura (`password_verify`)
- Cookies para recordar sesión con `Remember Me`
- Logout con destrucción de sesión y cookies

### 🔁 Recuperación de Contraseña
- Verificación de usuario
- Página para introducir nueva contraseña
- Validación de coincidencia de campos y actualización segura

### 🧭 Navegación e Interfaz
- Interfaz moderna y responsiva con **Tailwind CSS**
- Header con enlaces visibles solo para usuarios logueados
- Redirección automática a login si se hace clic fuera de enlaces conocidos
- Mensajes de error y éxito integrados en la interfaz

### ✨ Reseñas y Recomendaciones
- Publicación de nuevas reseñas
- Vista de todas las reseñas con resumen, puntuación y autor
- Página de inicio personalizada con libros reseñados
- Página de recomendaciones con libros **aún no reseñados**
- Posibilidad de listar todos los libros desde la tabla `libros`

---

## 📁 Archivos Clave

- `register.php` → Registro de usuario con validación y hash de contraseña  
- `login_process.php` → Login con verificación segura  
- `reset_password.php` → Restablecer contraseña con confirmación  
- `pagina_inicio_usuario.php` → Página personalizada del usuario  
- `recomendaciones.php` → Muestra libros sin reseñas (o todos)  
- `reseñas.php` → Todas las reseñas disponibles  
- `nueva_reseña.php` → Formulario para dejar una nueva reseña  
- `logout.php` → Cierra sesión y limpia cookies  
- `login.html` → Interfaz login con alertas y remember me  
- `verify_user.php` → Paso previo al reset de contraseña  
- `reset_password.html` → Formulario seguro para ingresar nueva contraseña  
- `forgot_password.html` → Formulario para buscar usuario existente  

---

## 🚀 Ideas a Futuro

- Filtros por categoría, autor o puntaje  
- Recomendaciones personalizadas por perfil de lectura  
- Búsqueda por título y autor  
- Paginación y orden por puntaje  
- Favoritos o lista de lectura  
- Subida de imagen de perfil  

---

## 👨‍💻 Autor

Proyecto desarrollado por **Tadeo Vardánega**  
Materia: **Arquitectura Web**  
Año: 2025
