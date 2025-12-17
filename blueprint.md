# Project Blueprint

## Overview
This project is a full-stack web application built with **Laravel 11** and **Filament PHP**, designed to manage PQRS (Peticiones, Quejas, Reclamos, y Sugerencias). It features a public-facing portal for users to submit and track requests, and a comprehensive admin panel for internal management.

## Project Outline

### Tech Stack
- **Backend**: PHP 8.2+, Laravel 11
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Admin Panel**: Filament PHP
- **Database**: MySQL/MariaDB (implied)

### Key Features
- **Public Portal**:
  - **Home Page**: Modern landing page with "liquid glass" design aesthetics.
  - **PQRS Submission**: Form to submit new requests.
  - **PQRS Tracking**: Consult status of requests.
- **Admin Dashboard**:
  - **Ticket Management**: View, assign, and resolve tickets.
  - **Role-based Access**: Super Admin, Regional Admin, etc.
  - **Reporting**: Visual widgets for ticket statistics.

## Recent Changes

### Navbar Scroll Animation
**Goal**: Enhance the user experience by hiding the navbar when scrolling down to maximize screen real estate, and revealing it when scrolling up for easy access.

**Implementation Details**:
- **File**: `resources/views/layouts/pqrs.blade.php`
- **Logic**: Used **Alpine.js** to track `window.scrollY`.
- **Behavior**:
  - Detect scroll direction.
  - Toggle a `showNavbar` state.
  - Apply `-translate-y-full` class to hide the navbar when `showNavbar` is false.
  - Ensure navbar is always visible at the very top of the page.

**Status**: Implemented and verified.

### Footer Contact Info Update
**Goal**: Clarify that the contact number provided in the footer is for a WhatsApp chatbot.

**Implementation Details**:
- **File**: `resources/views/layouts/pqrs.blade.php`
- **Change**: Updated the label "Línea de PQR" to "Línea WhatsApp Chatbot".
- **Change**: Increased the size of the footer logo for better visibility.

### PQR Form Updates
**Goal**: Improve PQR creation form usability and data collection flexibility.
**Implementation Details**:
- **File**: `app/Livewire/CreatePqrs.php`, `resources/views/livewire/create-pqrs.blade.php`
- **Change**: Made "Last Name" field optional and hidden when Document Type is "NIT".
- **Change**: Made "Email" field optional.
- **Change**: Verified "Address" field is mandatory.
- **Change**: Added an optional checkbox for "Authorization to send documents via email" and ensured it saves to the database.
- **Change**: Made "Phone" (Celular) field optional.
- **Change**: Translated validation messages and field names to Spanish (e.g., "data.description" -> "descripción de la solicitud").

### Welcome Page Regulatory Sections
**Goal**: Add mandatory regulatory and vigilance information to the public home page.

**Implementation Details**:
- **File**: `resources/views/welcome.blade.php`
- **Feature**: Added "Entidades de Vigilancia y Regulación" section immediately after the Hero banner.
    - **Design**: Centered grid of 3 premium cards.
    - **Style**: Cards feature a deep blue/cyan gradient header to support white logos, with a white content area below.
    - **Interactions**: Hover effects include shadow lift and "View Official Site" text reveal.
- **Feature**: Added "Marco Normativo" section (Res 5050, Res 5111, Circular SIC, Ley 1336) at the bottom of the page content.
