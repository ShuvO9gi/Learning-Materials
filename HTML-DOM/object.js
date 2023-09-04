function Person(first, last, age) {
  this.fname = first;
  this.lname = last;
  this.age = age;
}

let myPerson = new Person("Java", "Script", 25);

let myPerson2 = new Person("React", "Redux", 20);

Person.prototype.nationality = "Bangladesh";

//console.log(`${myPerson.fname} country is ${myPerson.nationality}`);

let obj = {
  fname: "Java",
  get fullname() {
    return "This is tesing";
  },
  set changePro(value) {
    this.lname = value;
  },
};

obj.changePro = "Script";

Object.defineProperty(obj, "changeName", {
  set: function (value) {
    this.fname = value;
  },
});
obj.changeName = "React";

console.log(obj.fname);
console.log(obj.lname);
console.log(obj.fullname);
