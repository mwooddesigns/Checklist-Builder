// var concat = require('concat-files');
var buildify = require('buildify');

var env = "development";

var prodDependencies = ['./dependencies/vue/dist/vue.min.js'];
var devDependencies = ['./dependencies/vue/dist/vue.js'];
var srcFiles = ['./src/js/functions.js', './src/js/components/task-item.js', './src/js/index.js'];

switch (env) {
  case "development":
    console.log("Running development concatenation.");
    var files = devDependencies.concat(srcFiles);

    buildify()
      .concat(files)
      .save("./dist/js/master.js");
    console.log("master.js file created");
    break;
  case "production":
    console.log("Running production concatenation.");
    var files = prodDependencies.concat(srcFiles);
    buildify()
      .concat(files)
      .save("./dist/js/master.js");
    console.log("master.js file created");
    break;
  default:
    console.log("An error occured: Unknown Environment");
    break;
}
