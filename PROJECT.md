# Samuel Car — Technical Project Documentation

## Project Overview

Samuel Car is a full-stack Laravel web application developed as an online car competition and merchandise platform.

The application allows users to browse competitions, purchase competition tickets, participate in skill-based questions and purchase merchandise through an online shopping basket.

The project was developed to demonstrate practical full-stack software development skills including backend development, database design, authentication, session management, CRUD functionality, media management and responsive frontend development.

---

## My Role

I designed and developed the application as a full-stack developer.

My responsibilities included:

- Application architecture and development
- Laravel backend development
- Database design and migrations
- Eloquent model development
- Controller and route development
- Blade and Livewire interface development
- Authentication functionality
- Competition management functionality
- Ticket purchasing functionality
- Shopping basket functionality
- Merchandise management
- Product media management
- Database relationships
- Frontend styling and responsive interface development
- Git version control and GitHub repository management
- Debugging and troubleshooting

---

## Core Functional Areas

### Competition Management

The application supports the management of car competitions.

Competition records include information such as:

- Competition title
- Competition slug
- Prize name
- Prize value
- Ticket price
- Maximum entries
- Draw date
- Competition status

---

### Ticket System

Users can purchase competition tickets through the application.

The ticket system supports:

- Ticket selection
- Ticket quantities
- Basket management
- Ticket pricing
- Competition-specific ticket handling
- Free ticket allocation through the skill-question system

---

### Skill Question System

The application includes a skill-based question mechanism that allows users to answer a question before receiving free competition tickets.

A successful interaction can add free tickets to the user's basket without interfering with paid ticket functionality.

---

### Merchandise System

The platform also includes an e-commerce component for merchandise.

Products can contain:

- Product name
- Description
- Price
- Stock quantity
- Active/inactive status
- Product images
- Additional media

---

### Shopping Basket

The shopping basket handles different types of items.

Competition tickets and merchandise are handled as separate basket items.

Competition ticket quantities can be adjusted while fixed-price bundle products maintain their intended pricing behaviour.

---

## Database Design

The application uses relational database structures to connect major parts of the system.

Key relationships include:

- Users
- Competitions
- Competition entries
- Products
- Product media

Laravel Eloquent relationships are used to retrieve and manage related records.

---

## Technologies Used

### Backend

- PHP
- Laravel
- Laravel Eloquent ORM
- Laravel Authentication

### Frontend

- Blade
- Livewire
- Tailwind CSS
- JavaScript
- HTML5
- CSS3

### Database

- MySQL

### Development Tools

- Git
- GitHub
- Composer
- NPM
- Vite

---

## Technical Challenges

During development, I worked through several practical development challenges including:

- Managing relationships between users, competitions and entries
- Implementing basket logic for different product types
- Separating paid tickets from free tickets
- Managing product media and image paths
- Building administrative CRUD functionality
- Troubleshooting Laravel routing and view issues
- Managing frontend assets through Vite
- Debugging database and application errors

---

## Development Approach

The project was developed incrementally.

The development process involved:

1. Designing the database structure
2. Creating Laravel migrations
3. Building Eloquent models
4. Creating application routes
5. Developing controllers and application logic
6. Building frontend interfaces
7. Implementing authentication
8. Developing competition functionality
9. Developing the ticket and basket system
10. Implementing merchandise functionality
11. Testing and debugging
12. Managing the project with Git
13. Publishing the project to GitHub

---

## Skills Demonstrated

This project demonstrates practical experience with:

- Full-stack web development
- Laravel development
- PHP programming
- MVC architecture
- Relational databases
- Database migrations
- Eloquent ORM
- CRUD operations
- Authentication
- Session management
- Shopping basket development
- E-commerce functionality
- Media/file handling
- Responsive web development
- Debugging
- Git
- GitHub
- Software project documentation

---

## Future Improvements

Potential future improvements include:

- Online payment gateway integration
- Automated email notifications
- Advanced reporting and analytics
- Expanded administrator permissions
- Automated competition draw functionality
- Order history
- Customer account management
- Automated stock management
- Production deployment and monitoring
