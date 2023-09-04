const myArray = ["Java", "Script", "React", "Redux"];
const myObject = { fname: "Java", lname: "Script" };
//const myObject = "ABCDEF";

/* let f = myArray.entries(); */

/* for (let x of myArray.entries()) {
  console.log(x);
} */

console.log(myObject.valueOf());

console.log(Object.entries(myObject));
console.log(myArray.keys());
console.log(myArray.splice(1, 2, "Angular", "Vue"));
console.log(myArray);

Array.prototype.cusPro = function () {
  for (let i = 0; i < this.length; i++) {
    this[i] = this[i].toUpperCase();
  }
};
