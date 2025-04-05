
Built by https://www.blackbox.ai

---

```markdown
# Varanasi Heritage Walk Planner

## Project Overview
The Varanasi Heritage Walk Planner is a web application designed to help users explore the rich heritage of Varanasi through curated walking tours. The application showcases featured heritage sites with detailed descriptions, images, and visitor information, along with a route planner that utilizes an interactive map.

## Installation
To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/varanasi-heritage-walk.git
   cd varanasi-heritage-walk
   ```

2. **Set up a local server**:
   Make sure you have a local server environment (like XAMPP, WAMP, or MAMP) set up. Place the project files in the server's root directory (e.g., `htdocs` for XAMPP).

3. **Access the application**:
   Open a web browser and navigate to `http://localhost/varanasi-heritage-walk/index.php`.

## Usage
- **Home Page**: Explore featured heritage sites and click on them for more details.
- **Map Page (`route.php`)**: View suggested walking routes with interactive markers on the map.
- **Site Details Page (`spot-details.php`)**: Get detailed information about each heritage site including history, entry fees, and best visiting times.
- **Contact Page (`contact.php`)**: Submit feedback or inquiries using the contact form.

## Features
- **Featured Heritage Sites**: Displays curated sites with images and essential details.
- **Interactive Map**: Utilizes OpenStreetMap to visually present walking routes and markers for heritage sites.
- **Responsive Design**: Built with Tailwind CSS for a mobile-friendly interface.
- **Contact Form**: Allows users to send inquiries or feedback directly through the website.

## Dependencies
The project includes the following external libraries:
- [Tailwind CSS](https://tailwindcss.com/): A utility-first CSS framework for styling.
- [Font Awesome](https://fontawesome.com/): Icons for a visually appealing interface.
- [Leaflet](https://leafletjs.com/): A leading open-source JavaScript library for mobile-friendly interactive maps.

## Project Structure
```plaintext
varanasi-heritage-walk/
|-- index.php          # Main landing page that displays featured sites
|-- data.php           # PHP file containing heritage site data
|-- route.php          # Page displaying the interactive route map
|-- spot-details.php    # Detailed view of each heritage site
|-- contact.php        # Page with a contact form for user feedback
|-- styles.css         # Custom styles (if any, not seen in shared files)
```

Each main page is designed to cater specific functionalities of the web application, providing users with a seamless experience as they explore the heritage of Varanasi.
```