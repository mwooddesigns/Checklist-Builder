var data = {
	task: "",
	taskList: []
};

var element = document.getElementById("checklist");

var newList = element.dataset.new == "false" ? false : true;

if(element != null) {
	var app = new Vue({
		el: "#checklist",
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
				if(!newList) {
					var configID = element.dataset.id;

					var http = new XMLHttpRequest();
					var url = "http://local.sandbox.com/apps/checklist-builder/dbcrud.php?read=" + configID;

					http.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var parsed = JSON.parse(this.responseText);
							data.taskList = JSON.parse(parsed[1]);
							console.log(data.taskList);
						}
					};

					http.open("GET", url, true);
					http.send();
				}
			}
		},
		created: function() {
			this.getList();
		}
	});
}

var Task = function(t) {
	this.text = t;
	this.completed = false;
};

/* Handler for hitting enter instead of using button */
function handleKeyUp(e) {
	var key = e.keyCode;
	if (key == 13) {
		app.addTask();
	}
}
