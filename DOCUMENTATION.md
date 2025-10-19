## Namibian Recipe Book Documentation

## Project Overview

The Namibian Recipe Book is a web-based application designed to store, manage, and browse traditional Namibian recipes. Built with PHP and MySQL, it provides a simple interface for users to add, view, edit, and delete recipes along with their ingredients. The application emphasizes preserving Namibian culinary heritage by organizing recipes by categories and regions.

## Architecture Diagram

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   Browser       │    │   index.php     │    │   Controllers   │
│                 │────│   (Router)      │────│                 │
│   User Interface│    │                 │    │ RecipeController│
└─────────────────┘    └─────────────────┘    │ IngredientCtrl  │
                                              └─────────────────┘
                                                       │
                                                       │
                                              ┌─────────────────┐
                                              │     Models      │
                                              │                 │
                                              │    Recipe       │
                                              │   Ingredient    │
                                              └─────────────────┘
                                                       │
                                                       │
                                              ┌─────────────────┐
                                              │   Database      │
                                              │                 │
                                              │   recipes       │
                                              │  ingredients    │
                                              └─────────────────┘
```

### Data Flow

1. **User Request**: User accesses URL with `?page=parameter`
2. **Routing**: `index.php` determines which controller method to call
3. **Controller Logic**: Controllers handle business logic, validate input, manage file uploads
4. **Model Interaction**: Models execute database queries using PDO
5. **View Rendering**: Controllers include appropriate PHP view files
6. **Response**: HTML/CSS/JavaScript returned to browser

## Technology Stack

### Backend
- **PHP 7.4+**: Server-side scripting language
- **PDO (PHP Data Objects)**: Database abstraction layer for secure database interactions
- **MySQL**: Relational database management system

### Frontend
- **HTML5**: Markup language for structure
- **CSS3**: Styling with custom properties 
- **JavaScript (Vanilla)**: Minimal client-side scripting for UI interactions

### Development Tools
- **XAMPP/LAMPP/WAMPP**: Local development environment (Apache, MySQL, PHP)
- **Git**: Version control
- **VS Code**: Code editor
- **Visual studio code**: Code editor
- **Google Drive**: Task Management and collaboration

## Project Structure

```
namibian_recipe_book/
├── index.php                 # Main entry point and router
├── config.php                # Database configuration
├── .htaccess                 # Apache configuration
├── recipe_book.sql           # Database schema and sample data
├── assets/                   # Static assets
│   ├── css/                  # Stylesheets
│   ├── images/               # Static images
│   └── uploads/              # User-uploaded recipe images
├── controllers/              # Business logic layer
│   ├── RecipeController.php
│   └── IngredientController.php
├── models/                   # Data access layer
│   ├── Recipe.php
│   └── Ingredient.php
├── pages/                    # View templates
│   ├── home.php
│   ├── recipes/
│   │   ├── add-recipe.php
│   │   ├── all-recipes.php
│   │   ├── recipe.php
│   │   ├── edit-recipe.php
│   │   └── delete-recipe.php
│   └── Ingredient/
│       ├── add-ingredient.php
│       ├── all-ingredients.php
│       ├── edit-ingredient.php
│       └── ingredient.php
└── shared/                   # Shared components
    ├── header.php            # HTML head and opening tags
    ├── nav.php               # Navigation bar
    └── footer.php            # Footer and closing tags
```

## Database Schema

### Tables

#### recipes
```sql
CREATE TABLE recipes (
    RecipeID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Instructions TEXT,
    Category VARCHAR(50),
    Region VARCHAR(50),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ImagePath VARCHAR(255)
);
```

#### ingredients
```sql
CREATE TABLE ingredients (
    IngredientID INT PRIMARY KEY AUTO_INCREMENT,
    RecipeID INT,
    Name VARCHAR(255),
    Quantity VARCHAR(50),
    Unit VARCHAR(50),
    CreatedAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (RecipeID) REFERENCES recipes(RecipeID)
);
```

## Key Features

### Recipe Management
- **Add Recipes**: Form-based input with image upload capability
- **View Recipes**: Detailed recipe pages with ingredients and instructions
- **Edit Recipes**: Update existing recipe information
- **Delete Recipes**: Remove recipes with confirmation
- **Search Recipes**: Full-text search across name, instructions, category, and region
- **Browse by Category/Region**: Filter recipes by metadata

### Ingredient Management
- **Add Ingredients**: Associate ingredients with specific recipes
- **View Ingredients**: Display ingredient lists for recipes
- **Edit Ingredients**: Modify ingredient details
- **Delete Ingredients**: Remove ingredients

### User Interface
- **Responsive Design**: Mobile-friendly layout using Bootstrap
- **Navigation**: Consistent navigation bar across all pages
- **Image Uploads**: Support for recipe photos with automatic file handling
- **Form Validation**: Client and server-side validation

## Configuration

### Database Configuration (config.php)
```php
<?php
$host = 'localhost';
$db = 'recipe_book';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
```

### File Upload Configuration
- **Upload Directory**: `assets/uploads/recipes/`
- **Allowed File Types**: Images only (`image/*`)
- **File Naming**: Timestamp-based to prevent conflicts
- **Permissions**: Directory must be writable (755 or 777)

### Apache Configuration (.htaccess)
```
# Enable URL rewriting for clean URLs (if implemented)
# Allow file uploads
# Set appropriate PHP limits
```

## How the Website Works

### Request Lifecycle

1. **Entry Point**: All requests go through `index.php`
2. **Configuration Loading**: Database connection established
3. **Routing**: `$_GET['page']` determines which controller action to execute
4. **Controller Execution**:
   - Instantiate appropriate controller
   - Call relevant method (add, showList, singleRecipe, etc.)
   - Handle form submissions and file uploads
5. **Model Interaction**: Controllers use models to perform CRUD operations
6. **View Rendering**: Controllers include PHP templates with data
7. **Response**: Complete HTML page sent to browser

### Example: Adding a Recipe

1. User navigates to `?page=add-recipe`
2. `RecipeController::add()` method called
3. If POST request:
   - Validate form data
   - Handle image upload (move to uploads directory)
   - Call `Recipe::insert()` to save to database
   - Redirect or show success message
4. Include `add-recipe.php` view template
5. Template renders form with any error/success messages

### Image Upload Process

1. Check if file was uploaded without errors
2. Generate unique filename using timestamp
3. Move uploaded file to `assets/uploads/recipes/` directory
4. Store relative path in database
5. Display image in recipe views

## Tools and Configurations

### Development Environment Setup

#### XAMPP/LAMPP/WAMPP
- **Installation**: Download and install 
    - XAMPP for linux (Ubuntu-OS) 
    - WAMPP for (Windows-OS)
- **Configuration**:
  - Configure Database connection details 
    - linux OS `/opt/lampp/phpmyadmin`
    - Windows OS `(optional)`
  - Start Apache and MySQL services
  - Place project directory (amibian_recipe_Book) into the `/opt/lampp/htdocs/` directory
  - Access via your browser `http://localhost/namibian_recipe_book/` or `http://127.0.0.1/namibian_recipe_Book`

#### Database Setup
1. Create database: `CREATE DATABASE recipe_book;`
2. Import schema: `mysql -u root -p recipe_book < recipe_book.sql`
3. Update `config.php` with your database credentials

#### PHP Configuration
- **Required Extensions**: PDO, PDO_MySQL
- **Recommended Settings**:
  - `upload_max_filesize = 10M`
  - `post_max_size = 12M`
  - `max_execution_time = 300`

#### Custom CSS Variables
```css
:root {
    --button-color: #d6a355;
    --text-color: #2c3e50;
    --border-color: #635120;
    --default: #f2f2f2;
}
```

### Security Considerations

- **Input Sanitization**: Use `htmlspecialchars()` for output
- **Prepared Statements**: All database queries use PDO prepared statements
- **File Upload Security**: 
  - Check file types
  - Use `move_uploaded_file()` instead of user input
  - Store files outside web root if possible
- **CSRF Protection**: Not implemented (recommendation for production)

## Deployment

### Production Requirements
- **Web Server**: Apache with PHP support
- **Database**: MySQL 5.7+
- **PHP**: 7.4+ with PDO extension
- **File Permissions**:On the Linux OS, Upload directories must be writable (chown 777 -R)

### Deployment Steps
1. Upload files to web server
2. Create database and import schema
3. Update `config.php` with production credentials
4. Set appropriate file permissions
5. Test functionality

### Environment Variables
For production, consider using environment variables instead of hard coded credentials in `config.php`.

## Troubleshooting

### Common Issues

#### Database Connection Errors
- Verify credentials in `config.php`
- Ensure MySQL service is running
- Check database exists and user has permissions

#### File Upload Failures
- Check upload directory permissions (755/777)
- Verify PHP upload limits in `php.ini`
- Ensure sufficient disk space

#### Blank Pages
- Enable error reporting: `ini_set('display_errors', 1);`
- Check PHP logs for fatal errors
- Verify file paths and includes

#### Image Display Issues
- Check file paths in database are correct
- Ensure images are accessible via web
- Verify upload directory is within document root

## Future Enhancements

- User authentication and authorization
- Recipe rating and commenting system
- Advanced search and filtering
- Recipe sharing and social features
- API endpoints for mobile app integration
- Admin panel for content management
- Multi-language support
- Recipe categories hierarchy
- Ingredient inventory management

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make changes following existing code style
4. Test thoroughly
5. Submit a pull request with clear description

## License

This project is open source. Please refer to the LICENSE file for details.

## Support

For issues or questions:
- Check the troubleshooting section
- Review PHP/MySQL error logs
- Ensure all requirements are met
- Test in a clean environment
