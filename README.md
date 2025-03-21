# PHP_POO
Exercices PHP orienté objet

# API Documentation

## 1. Endpoint : User registering

### URL
`POST /php_poo/api/register`

### Description
This endpoint is used to register new users into the database, by sending JSON data.

### Required Headers
| Key                        | Value                   |
|----------------------------|-------------------------|
| Content-Type               | application/json        |
| Access-Control-Allow-Origin| *                       |

### Parameters (Body JSON)
| Parameter  | Type   | Required | Description                  |
|------------|--------|--------|--------------------------------|
| username   | string | Yes    | Username                       |
| email      | string | Yes    | Email address                  |
| password   | string | Yes    | Password                       |

### Request example
```json
{
  "username": "JohnDoe",
  "email": "johndoe@example.com",
  "password": "securepassword123"
}
```

### Response

#### Success :
**Code :** `200 OK`
```json
{
  "message": "Success",
  "code response": 200
}
```

#### Error : Missing data
**Code :** `400 Bad Request`
```json
{
  "message": "Missing data",
  "code response": 400
}
```

#### Error : Unauthorized method
**Code :** `405 Method Not Allowed`
```json
{
  "message": "Unauthorized method",
  "code response": 405
}
```

---

## 2. Endpoint : Users retrieving

### URL
`GET /php_poo/api/users`

### Description
This endpoint returns every user from the database.

### Headers requis
| Key                        | Value                   |
|----------------------------|-------------------------|
| Content-Type               | application/json        |
| Access-Control-Allow-Origin| *                       |

### Parameters (No parameter expected)

### Response example

#### Success :
**Code :** `200 OK`
```json
{
  "message": "Success",
  "code response": 200,
  "body": [
    {
      "username": "JohnDoe",
      "email": "johndoe@example.com"
    },
    {
      "username": "JaneDoe",
      "email": "janedoe@example.com"
    }
  ]
}
```

#### Error : Unauthorized method
**Code :** `405 Method Not Allowed`
```json
{
  "message": "Unauthorized method",
  "code response": 405
}
```

---

### Notes
- Request body has to be a `JSON`.
- Make sure that `Content-Type` & `Access-Control-Allow-Origin` headers are set up.
- Make sure the database is accessible, and has data.

