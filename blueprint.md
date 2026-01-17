# Project Blueprint

## Overview
This project is a PQR (Peticiones, Quejas, Reclamos) management system for Intalnet Telecommunications. It allows users to submit requests and allows administrators to manage them.

## Current Request Plan: Restrict Input to Numbers
The user wants to ensure that fields like "Cédula" (Document Number) only accept numeric input.

### Proposed Changes
**Frontend (Blade/Alpine.js):**
- Modify `resources/views/livewire/create-pqrs.blade.php`.
- Add `x-on:input` handlers to the following fields to strip non-numeric characters:
    - `data.document_number` (Número de documento)
    - `data.phone` (Celular)
    - `data.landline` (Teléfono fijo)
    - `data.contract_number` (Código de contrato)

**Backend (Laravel Validation):**
- Modify `app/Livewire/CreatePqrs.php`.
- Update `rules()` method to include `regex:/^[0-9]+$/` for:
    - `data.document_number`
    - `data.phone`
    - `data.landline`
    - `data.contract_number`

### Rationale
Enforcing numeric input on the client side improves user experience by preventing invalid characters (like letters or punctuation) from being entered in fields that strictly require digits. Backend validation ensures data integrity even if client-side scripts are bypassed.

### Verification
- Check that typing letters into the document number field does not work.
- Check that typing numbers works.
