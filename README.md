# Project Version 2: Continent and City Management System

## Project Overview

This project aims to develop an advanced version of the initial project by adopting Object-Oriented Programming (OOP) with PHP. The goal is to integrate new features and optimize the management of entities. Once the back-end is finalized, you are encouraged to enhance the user interface (UI/UX) to make the site more modern, user-friendly, and attractive.

### Key Features:
- Implementing a robust back-end using PHP and OOP concepts.
- Designing a more intuitive and modern user interface.
- Adding new functionalities for better management of continents, countries, and cities.

---

## Project Objectives

- **Backend Development:**
  - **User Authentication:** Implement authentication for both users and admins.
  - **CRUD Operations:** Implement functionality to add, update, and delete continents, countries, and cities with their respective details.
  - **Data Management:** Use PDO for secure database interactions and manage data safely with prepared statements.
  
- **Frontend Enhancement:**
  - Improve the user interface and experience by implementing modern design principles.
  - Ensure the platform is more ergonomic and visually appealing.

---

## User Stories

1. **As a designer**, correct the use case diagram created in version 1 by adding missing functionalities and necessary improvements.
2. **As a designer**, create a UML class diagram for the system.
3. **As a Back-End Developer**, implement an object-oriented architecture for managing the following entities:
   - **Continent:** ID, Name, Number of countries.
   - **Country:** ID_Country, Country Name, Population, Language, Associated Continent.
   - **City:** ID_City, City Name, City Description, City Type (capital or other), Associated Country.
4. **As a Back-End Developer**, implement the following functionalities using PHP classes:
   - User/Admin authentication.
   - Add, update, or delete continents, countries, and cities with their respective information.
   - Display lists of continents, countries, and cities with their details.
   - Centralize database connection and queries using a dedicated class (`GestionBaseDeDonnées`) with secure data handling (PDO and prepared statements).
   - Utilize PHP built-in functions to manipulate data effectively.

---

## Bonus Features

- **Globalization:** Generalize the website to include all continents.
- **Search Engine:** Add a search feature to access country or city information quickly.
- **Dynamic Filters:**
  - Filter countries by continent.
  - Filter cities by type (capital, other).
- **Dynamic Statistics:**
  - Number of cities per country.
  - Number of countries per continent.
  - The continent with the largest population.
  - The most populated city per continent.

---

## links

- [Presentation](https://www.canva.com/design/DAGZZGAMJaE/u7EZKbZy0qiGaLtTR3bkvg/edit?utm_content=DAGZZGAMJaE&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

- [Planning GitHub](https://github.com/users/laamiri-kaoutar/projects/11)

