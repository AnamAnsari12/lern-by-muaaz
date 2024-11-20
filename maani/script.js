console.log("Mr .muaaz shakih sahab sir ");
// let arr = [
//   [1, 2],
//   [1, 4, 5, 6],
//   [3, 3, 1],
// ];
// arr.forEach((ele, i) => {
//   //   ele=[2]
//   console.log(ele + " " + i);
//   console.log(ele[1]);
// });

//  {} scope- scope k bahr let accses nahi hota
// [[1,2], [1,4,5,6], [3,3,1]] store array
// let array = [
//   { a: 23, b: 43 },
//   { a: 69, b: 12 },
//   { a: 99, b: 23 },
// ];
// const obj = { a: 23, b: 43 };
// console.log(obj.a);
// array.forEach((e) => {
//   console.log(e.a);
// });
// let array = [
//   [1, [2, 3]],
//   [1, [7, 2, 1], 5, [9, 2, 4]],
//   [3, [7, 3, 5], 1],
// ];
// // console.log(array);
// array.forEach((e, i) => {
//   console.log(e[1][1]);
// });
// let arr = [
//   [1, 2],
//   [1, 4, 5, 6],
//   [3, 3, 1],
// ];

// arr.forEach((e) => {
//   //   console.log(e + " " + i);
//   e.forEach((m) => {
//     console.log(m);
//   });
// });
// let newarr = [7, 2, 4, 8, 9, 4];
// newarr.forEach((e) => {
//   if (e * 2 >= 10) console.log(e * 2);
// });
// const books = [
//   {
//     title: "Book",
//     author: "Name",
//   },
//   {
//     title: "Book2",
//     author: "Name2",
//   },
// ];

// books.forEach((b) => {
//   console.log(b.title);
// });
// let array = [ 1,2,3,4,5 ]
// function anam(arr, rma) {
//   console.log(arr);
//   arr.forEach((x) => {
//     if (x != rma) {
//       console.log(x);
//     }
//   });
// }
// anam([1, 2, 3, 4, 5], 3);

// let arr = [1, 2, 3];
// arr.forEach((e) => {
//   console.log(e);
// });
// let age = 15;
// if (age >= 19) {
//   console.log("you can vote");
// } else {
//   console.log("not allowed");
// }
// Given an array of numbers, use a forEach loop to print each number in the array.
// let arr1=[1,2,3,4,6];
// arr1.forEach((e)=>[
//   console.log(e)
// ])
// Qus 2-iven an array of numbers, use forEach to calculate and print the sum of all numbers.

// let arrOfSum = [1, 2, 3, 4];
// let sum = 0;
// arrOfSum.forEach((num) => {
//   sum = num + sum;
// });
// console.log("sum of array ", sum);

// qus 3 Given an array of numbers, use forEach to log only the even numbers in the array.

// let FindEvenNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// FindEvenNum.forEach((e) => {
//   if (e % 2 == 0) {
//     console.log(e);
//   }
// });

// function findEvenNumbers(arr) {
//   arr.forEach((e) => {
//     if (e % 2 == 0) {
//       console.log(e);
//     }
//   });
// }
// findEvenNumbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
// Given an array of strings, use forEach to convert each string to uppercase and log the updated array.

// let convtoupp = ["anam", "maaz", "aarambh", "anam", "bushra", "anam"];

// convtoupp.forEach((word, index, arr) => {
//   arr[index] = word.toUpperCase();
// });
// console.log(convtoupp);

// Given an array of numbers, use forEach to add 10 to each number and log the updated array.

// function addnum(arr) {
//   arr.forEach((num, ind) => {
//     arr[ind] = num + 10;
//   });
//   return arr;
// }

// let result = addnum([2, 3, 4]);
// console.log(result);

function addnum(arr) {
  arr.forEach((num, ind) => {
    arr[ind] = num + 10;
  });
  return arr;
}
let res = addnum([2, 4, 6]);
console.log(res);
// Count Occurrences of a Specific Element -Given an array of numbers, use forEach to count how many times a specific number appears in the array.

// qus) Extract First Letter

// Given an array of words, use forEach to log the first letter of each word.

// Check for a Specific Word

// Given an array of strings, use forEach to check if a specific word (e.g., "hello") is in the array and log a message if found.
// Filter Names by Length

// Given an array of names, use forEach to log only the names that are shorter than 5 characters.
// Multiply Each Element by Its Index

// Given an array of numbers, use forEach to multiply each element by its index and print the resulting values.

// 1, if the value is greater than zero,
// -1, if less than zero,
// 0, if equals zero.
let message;

if (login == "Employee") {
  message = "Hello";
} else if (login == "Director") {
  message = "Greetings";
} else if (login == "") {
  message = "No login";
} else {
  message = "";
}

let msg =
  login == "emp"
    ? "hello"
    : login == "dir"
    ? " geting"
    : login == ""
    ? "no login"
    : "";
