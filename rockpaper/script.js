console.log("connected");
function getComputerChoice() {
  let rendomvariable = Math.random();
  console.log(rendomvariable);
  if (rendomvariable >= 0.0 && rendomvariable <= 0.3) {
    return "rock";
  } else if (rendomvariable >= 0.31 && rendomvariable <= 0.6) {
    return "pepar";
  } else {
    return "sessior";
  }
}
console.log(getComputerChoice());
