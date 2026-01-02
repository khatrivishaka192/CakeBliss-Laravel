# Admin API Documentation

This document provides comprehensive API documentation for the Admin API endpoints. All admin endpoints require authentication except the login endpoint.

## Base URL
```
http://your-domain.com/api/admin
```

## Authentication

Admin APIs use token-based authentication. After logging in, you'll receive a token that must be included in subsequent requests.

### Headers Required
```
Authorization: Bearer {your_token}
```
OR
```
Authorization: {your_token}
```

---

## Authentication Endpoints

### 1. Admin Login
**POST** `/api/admin/login`

**Request Body:**
```json
{
    "email": "admin@example.com",
    "password": "admin123"
}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Login successful",
    "token": "your_api_token_here",
    "admin": {
        "email": "admin@example.com"
    }
}
```

**Response (Error - 401):**
```json
{
    "success": false,
    "message": "Invalid credentials"
}
```

---

### 2. Get Current Admin Info
**GET** `/api/admin/me`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "admin": {
        "email": "admin@example.com"
    }
}
```

---

### 3. Admin Logout
**POST** `/api/admin/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Logged out successfully"
}
```

---

## Cakes Management

### 1. List All Cakes
**GET** `/api/admin/cakes`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Chocolate Cake",
            "category_id": 1,
            "price": "25.00",
            "image": "cakes/image.jpg",
            "description": "Delicious chocolate cake",
            "ingredients": "Flour, sugar, cocoa",
            "created_at": "2025-01-01T00:00:00.000000Z",
            "updated_at": "2025-01-01T00:00:00.000000Z",
            "category": {
                "id": 1,
                "name": "Regular"
            }
        }
    ],
    "count": 1
}
```

---

### 2. Get Single Cake
**GET** `/api/admin/cakes/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Chocolate Cake",
        "category_id": 1,
        "price": "25.00",
        "image": "cakes/image.jpg",
        "description": "Delicious chocolate cake",
        "ingredients": "Flour, sugar, cocoa",
        "category": {
            "id": 1,
            "name": "Regular"
        }
    }
}
```

---

### 3. Create New Cake
**POST** `/api/admin/cakes`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body (Form Data):**
```
name: Chocolate Cake
category_id: 1
price: 25.00
image: [file]
description: Delicious chocolate cake with rich flavor
ingredients: Flour, sugar, cocoa, eggs, butter
```

**Response (Success - 201):**
```json
{
    "success": true,
    "message": "Cake created successfully",
    "data": {
        "id": 1,
        "name": "Chocolate Cake",
        "category_id": 1,
        "price": "25.00",
        "image": "cakes/image.jpg",
        "description": "Delicious chocolate cake with rich flavor",
        "ingredients": "Flour, sugar, cocoa, eggs, butter",
        "category": {
            "id": 1,
            "name": "Regular"
        }
    }
}
```

---

### 4. Update Cake
**PUT** `/api/admin/cakes/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body (Form Data - all fields optional):**
```
name: Updated Cake Name
category_id: 2
price: 30.00
image: [file] (optional)
description: Updated description
ingredients: Updated ingredients
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Cake updated successfully",
    "data": {
        "id": 1,
        "name": "Updated Cake Name",
        "category_id": 2,
        "price": "30.00",
        "image": "cakes/new_image.jpg",
        "description": "Updated description",
        "ingredients": "Updated ingredients",
        "category": {
            "id": 2,
            "name": "Customized"
        }
    }
}
```

---

### 5. Delete Cake
**DELETE** `/api/admin/cakes/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Cake deleted successfully"
}
```

---

## Categories Management

### 1. List All Categories
**GET** `/api/admin/categories`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Regular",
            "description": null,
            "cakes_count": 5,
            "created_at": "2025-01-01T00:00:00.000000Z",
            "updated_at": "2025-01-01T00:00:00.000000Z"
        }
    ],
    "count": 1
}
```

---

### 2. Get Single Category
**GET** `/api/admin/categories/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Regular",
        "description": null,
        "cakes": [
            {
                "id": 1,
                "name": "Chocolate Cake",
                "price": "25.00"
            }
        ],
        "created_at": "2025-01-01T00:00:00.000000Z",
        "updated_at": "2025-01-01T00:00:00.000000Z"
    }
}
```

---

### 3. Get Cakes by Category
**GET** `/api/admin/categories/{id}/cakes`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "category": {
        "id": 1,
        "name": "Regular"
    },
    "data": [
        {
            "id": 1,
            "name": "Chocolate Cake",
            "price": "25.00"
        }
    ],
    "count": 1
}
```

---

### 4. Create New Category
**POST** `/api/admin/categories`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Request Body:**
```json
{
    "name": "Wedding",
    "description": "Wedding cakes"
}
```

**Response (Success - 201):**
```json
{
    "success": true,
    "message": "Category created successfully",
    "data": {
        "id": 2,
        "name": "Wedding",
        "description": "Wedding cakes",
        "created_at": "2025-01-01T00:00:00.000000Z",
        "updated_at": "2025-01-01T00:00:00.000000Z"
    }
}
```

---

### 5. Update Category
**PUT** `/api/admin/categories/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Request Body:**
```json
{
    "name": "Updated Category",
    "description": "Updated description"
}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Category updated successfully",
    "data": {
        "id": 1,
        "name": "Updated Category",
        "description": "Updated description"
    }
}
```

---

### 6. Delete Category
**DELETE** `/api/admin/categories/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Category deleted successfully"
}
```

**Response (Error - 400):**
```json
{
    "success": false,
    "message": "Cannot delete category with existing cakes"
}
```

---

## Orders Management

### 1. List All Orders
**GET** `/api/admin/orders`

**Headers:**
```
Authorization: Bearer {token}
```

**Query Parameters (Optional):**
- `status`: Filter by status (pending, processing, completed, cancelled)

**Example:**
```
GET /api/admin/orders?status=pending
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "customer_name": "John Doe",
            "email": "john@example.com",
            "phone": "1234567890",
            "address": "123 Main St",
            "total": "50.00",
            "status": "pending",
            "created_at": "2025-01-01T00:00:00.000000Z",
            "updated_at": "2025-01-01T00:00:00.000000Z",
            "items": [
                {
                    "id": 1,
                    "order_id": 1,
                    "cake_name": "Chocolate Cake",
                    "quantity": 2,
                    "price": "25.00",
                    "subtotal": "50.00"
                }
            ]
        }
    ],
    "count": 1
}
```

---

### 2. Get Order Statistics
**GET** `/api/admin/orders/stats`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": {
        "total": 100,
        "pending": 20,
        "processing": 15,
        "completed": 60,
        "cancelled": 5,
        "total_revenue": "5000.00"
    }
}
```

---

### 3. Get Single Order
**GET** `/api/admin/orders/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "customer_name": "John Doe",
        "email": "john@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "total": "50.00",
        "status": "pending",
        "items": [
            {
                "id": 1,
                "order_id": 1,
                "cake_name": "Chocolate Cake",
                "quantity": 2,
                "price": "25.00",
                "subtotal": "50.00"
            }
        ]
    }
}
```

---

### 4. Update Order Status
**PUT** `/api/admin/orders/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Request Body:**
```json
{
    "status": "processing"
}
```

**Valid Status Values:**
- `pending`
- `processing`
- `completed`
- `cancelled`

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Order updated successfully",
    "data": {
        "id": 1,
        "customer_name": "John Doe",
        "email": "john@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "total": "50.00",
        "status": "processing",
        "items": [...]
    }
}
```

---

### 5. Delete Order
**DELETE** `/api/admin/orders/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Order deleted successfully"
}
```

---

## Contacts Management

### 1. List All Contacts
**GET** `/api/admin/contacts`

**Headers:**
```
Authorization: Bearer {token}
```

**Query Parameters (Optional):**
- `per_page`: Number of items per page (default: 10)

**Example:**
```
GET /api/admin/contacts?per_page=20
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "message": "Hello, I have a question...",
            "created_at": "2025-01-01T00:00:00.000000Z",
            "updated_at": "2025-01-01T00:00:00.000000Z"
        }
    ],
    "pagination": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 10,
        "total": 50
    }
}
```

---

### 2. Get Single Contact
**GET** `/api/admin/contacts/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "message": "Hello, I have a question...",
        "created_at": "2025-01-01T00:00:00.000000Z",
        "updated_at": "2025-01-01T00:00:00.000000Z"
    }
}
```

---

### 3. Delete Contact
**DELETE** `/api/admin/contacts/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success - 200):**
```json
{
    "success": true,
    "message": "Contact deleted successfully"
}
```

---

## Error Responses

All endpoints return consistent error responses:

**401 Unauthorized:**
```json
{
    "success": false,
    "message": "Authentication token required"
}
```

**404 Not Found:**
```json
{
    "success": false,
    "message": "Resource not found"
}
```

**422 Validation Error:**
```json
{
    "success": false,
    "message": "The given data was invalid.",
    "errors": {
        "field_name": ["Error message"]
    }
}
```

---

## Postman Collection Setup

### Step 1: Login
1. Create a POST request to `/api/admin/login`
2. Set Body to `raw` JSON:
```json
{
    "email": "admin@example.com",
    "password": "admin123"
}
```
3. Copy the `token` from the response

### Step 2: Set Authorization
1. Go to the Collection/Request settings
2. Under Authorization tab, select "Bearer Token"
3. Paste your token in the Token field
4. This will automatically add `Authorization: Bearer {token}` header to all requests

### Step 3: Test Endpoints
All other endpoints will now use the token automatically!

---

## Notes

- All timestamps are in ISO 8601 format (UTC)
- Image uploads use `multipart/form-data` content type
- Token expires when server restarts (in-memory storage)
- For production, consider implementing database-backed token storage
- All prices are stored as decimals with 2 decimal places

