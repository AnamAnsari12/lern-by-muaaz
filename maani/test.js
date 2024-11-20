// create a function name sum array that takes  an array of integers as input and returns the sum of all numbers

// function sumOfArray(arr) {
//   let sum = 0;
//   arr.forEach((e) => {
//     sum += e;
//   });
//   return sum;
// }
// let sum = sumOfArray([2, 4, 6, 8]);

// console.log(sum);
// create a function that takes an array of strings and returns the count of strings
// function str(arr) {
//   let sum = 0;
//   arr.forEach((e) => {
//     sum++;
//   });
//   return sum;
// }
// let totalofstr = str(["anam", "muaaz", "humza", "azalfa", "adam", "tehmer"]);
// console.log(totalofstr);
// create a function that takes an array of strings and returns count of the string anam?
// ['anam', 'maaz', 'aarambh', 'anam', 'bushra', 'anam']
// function countString(array) {
//   let cnt = 0;
//   array.forEach((e) => {
//     if (e == "anam") {
//       cnt++;
//     }
//   });
//   return cnt;
// }
// let totalstr = countString([
//   "anam",
//   "maaz",
//   "aarambh",
//   "anam",
//   "bushra",
//   "anam",
// ]);
// console.log(totalstr);
//  create a function that takes an array of strings and retrns an object contenting count of each strings

function convertIntoObj(arr) {
  let obj = {};
  arr.forEach((e) => {
    obj[e] = (obj[e] || 0) + 1;
  });
  return obj;
}
let showobj = convertIntoObj([
  "anam",
  "maaz",
  "aarambh",
  "anam",
  "bushra",
  "anam",
  "maaz",
  "maaz",
  "bushra",
  "bushra",
  "bushra",
]);
console.log(showobj);
