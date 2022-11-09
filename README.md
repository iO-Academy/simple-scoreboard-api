# Simple Scoreboard API

A simple API to manage scores

## Install the Application

Clone this repo:

```bash
git clone git@github.com:iO-Academy/simple-scoreboard-api.git
```

Create a new DB named `scoreboard` and import `db/scoreboard.sql`

One cloned, you must install the slim components by running from the root:

```bash
composer install
```

To run the application locally:
```bash
composer start

```
Run this command in the application directory to run the test suite
```bash
composer test
```

That's it! 

## API documentation

### Return all scores categories

* **URL**

  /scores

* **Method:**

  `GET`

* **URL Params**

   There are no URL params

  **Example:**

  `/scores`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
    "message": "Scores successfully retrieved from db.",
    "data":
    [
        {
            "id": "1",
            "name": "Gilbert",
            "score": "8"
        }
    ]
  }
  ```

### Add new score

* **URL**

  /scores

* **Method:**

  `POST`

* **URL Params**

   There are no URL params

  **Example:**

  `/scores`

* **Body Data**

   There are no URL params

  **Example:**

  ```json
  {"name":"Gilbert","score":"8"}
  ```

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
    "message": "Scores successfully added to db.",
    "status": 200,
    "data": true
    }
  ```

