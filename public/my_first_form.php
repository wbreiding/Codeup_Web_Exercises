<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>My First HTML Form</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/bootstrap.min.js"></script>
  </head>

  <body>

    <?php
  var_dump($_GET);
  var_dump($_POST);
?>
  <h2>User Login</h2>
    <form method="POST" action="/my_first_form.php">
        <p>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Enter your username">
        </p>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Enter your password">
        </p>
        <p>
            <button type="submit" name="Submit">Login</button>
        </p>
    </form>

<h2>Compose an Email</h2>
    <form method="POST" action="/my_first_form.php">
      <p>
        <label for="to">To</label>
        <input id="to" name="to" type="text">
      </p>
      <p>
        <label for="from">From</label>
        <input id="from" name="from" type="text">
      </p>
      <p>
        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text">
      </p>
      <p>
        <label for="body">Body</label>
        <textarea id="body" name="body" rows="5" cols="40">Email Content</textarea>
      </p>
      <p>
        <input type="checkbox" id="saveCopy" name="saveCopy">
        <label for="saveCopy">Save a copy to your sent mail?</label>
      </p>
      <p>
        <input type="submit" name="Send" value="Send">
      </p>
    </form>

    <h2>Multiple Choice Test</h2>

    <form action="/my_first_form.php" method="POST">
      <p>
        What is your favorite City in Texas?
        <label>
          <input type="radio" name="TXcity" value="Austin">
          Austin
        </label>
        <label>
          <input type="radio" name="TXcity" value="San Antonio">
          San Antonio
        </label>
        <label>
          <input type="radio" name="TXcity" value="Dallas">
          Dallas
        </label>
        <label>
          <input type="radio" name="TXcity" value="Houston">
          Houston
        </label>
      </p>

      <p>
        What is your favorite city in Florida?
        <label>
          <input type="radio" name="FLcity" value="Miami">
          Miami
        </label>
        <label>
          <input type="radio" name="FLcity" value="Orlando">
          Orlando
        </label>
        <label>
          <input type="radio" name="FLcity" value="Tampa">
          Tampa
        </label>
        <label>
          <input type="radio" name="FLcity" value="Talahassee">
          Talahassee
        </label>
      </p>
      <p>Where have you lived before? (select all that apply)
        <label><input type="checkbox" id="1" name="livedCity[]" value="Miami">Miami</label>
        <label><input type="checkbox" id="2" name="livedCity[]" value="Orlando">Orlando</label>
        <label><input type="checkbox" id="3" name="livedCity[]" value="San Antonio">San Antonio</label>
        <label><input type="checkbox" id="4" name="livedCity[]" value="Austin">Austin</label>
        <label><input type="checkbox" id="5" name="livedCity[]" value="Dallas">Dallas</label>
      </p>
      <p>
        <label for="multiSelect">Where would you like to live?</label>
        <select id="multiSelect" name="multiSelect[]" multiple>
          <option>Miami</option>
          <option>Austin</option>
          <option>Seattle</option>
          <option>Dallas</option>
        </select>
      </p>

      <p><input type="submit" name="submit" value="Submit"></p>

    </form>

    <h2>Select Testing</h2>
    <form action="/my_first_form.php" method="POST">
      <label for="YesNo">Do you like coding?</label>
      <select id="YesNo" name="YesNO">
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
      </select>

      <input type="submit" name="Submit" value="Submit">

    </form>

  </body>
</html>
