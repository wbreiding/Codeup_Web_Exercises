// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'violet'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
if (color == "red") {
  console.log(color + " is the color of blood.");
} else if (color == "orange") {
  console.log(color + " is the color of oranges.");
} else if (color == "yellow") {
  console.log(color + " is the color of the sun.");
} else if (color == "green") {
  console.log(color + " is the color of grass.");
} else if (color == "blue") {
  console.log(color + " is the color of the sky.");
} else {
  console.log(color + "I do not know anything by that color.");
}

// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
(color == favorite) ? console.log(color + "! There is a match!") : console.log(color + ". It is not a match.");
