/* const number = "+88019-1548910"; */
/* const number = "+88-01915489100"; */
const number = "01915489100";

/* const regex = /(\+88)?-?01[1-9]\d{8}/g; */   /* "+88-01915489100","01915489100" */
/* const regex = /([(\+)?|(00)?]{1})?88-?01[1-9]\d{8}/g; */
/* const regex = /(((\+)?|(00)?))?88-?01[1-9]\d{8}/g; */
/* const regex = /((\+)?|(00)?)88-?01[1-9]\d{8}/g; */ /* "88-01915489100", "+88-01915489100","0088-01915489100", "8801915489100" */
/* const regex = /(((\+)?|(00)?)88)?-?01[1-9]\d{8}/g;  */ /* "88-01915489100", "+88-01915489100","0088-01915489100", "01915489100" */
/* const regex = /(((\+)?|(00)?)88)?-?\d{2}[1-9]\d{8}/g; */ 
const regex = /(((\+)?(00)?)88)?-?\d{2}[1-9]\d{8}/g;

const matches = number.match(regex);

const index = number.search(regex);

const replaced = number.replace(regex, "013-00000000");

const test = regex.test(number);

console.log(matches, index, replaced, test);