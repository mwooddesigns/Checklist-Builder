var data = {
	task: "",
	taskList: []
};

var app = new Vue({
	el: "#todoList",
	data: data,
	methods: {
		addTask: function() {
			if (this.task.length > 0) {
				this.taskList.push(new Task(this.task));
				this.task = "";
			}
		},
		saveList: function() {
			var json_str = JSON.stringify(this.taskList);
			createCookie("taskListString", json_str);
		},
		getList: function() {
			var json_str = readCookie("taskListString");
			if (json_str != null) {
				var parsed = JSON.parse(json_str);
				this.taskList = parsed;
			}
		}
	},
	beforeMount: function() {
		this.getList();
	},
	updated: function() {
		this.saveList();
	}
});

var Task = function(t) {
	this.text = t;
	this.completed = false;
}

/* Handler for hitting enter instead of using button */
function handleKeyUp(e) {
	var key = e.keyCode;
	if (key == 13) {
		app.addTask();
	}
}
