<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>

  <link rel="stylesheet" href="dependencies/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/master.css">
</head>

<body>

  <div class="container">
    <div id="todoList">
      <h1>Checklist Builder</h1>
      <div class="controls">
        <input type="text" v-model="task" placeholder="Enter a task:" onkeyup="handleKeyUp(event)" />
        <button @click="addTask" id="submit">Add</button>
        <!-- 			<button @click="saveList">Save</button> -->
      </div>
      <div class='task-list'>
        <task-item v-for="(item, index) in taskList" :text="item.text" :status="item.completed" :number="index"></task-item>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="dist/js/master.js"></script>


</body>

</html>
