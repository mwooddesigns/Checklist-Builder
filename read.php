<?php include("header.php"); ?>

    <div id="checklist" data-new="false" data-id="1"> <!-- Need to set id dynamically. -->
      <h1>Checklist Builder</h1>
      <div class="controls">
        <!-- <input type="text" v-model="task" placeholder="Enter a task:" onkeyup="handleKeyUp(event)" />
        <button @click="addTask" id="submit">Add</button> -->
        <!-- 			<button @click="saveList">Save</button> -->
      </div>
      <div class='checklist'>
        <task-item v-for="(item, index) in taskList" :text="item.text" :status="item.completed" :number="index"></task-item>
      </div>

<?php include("footer.php"); ?>
