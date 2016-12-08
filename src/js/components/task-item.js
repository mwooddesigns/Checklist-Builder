Vue.component('task-item', {
	props: ['text', 'number', 'status'],
	data: function() {
		return data;
	},
	methods: {
		removeTask: function() {
			data.taskList.splice(this.number, 1)
		},
		toggleStatus: function() {
			data.taskList[this.number].completed = !data.taskList[this.number].completed
		}
	},
	template: "<transition name='fade'><div class='task'><p class='left' :class='{complete: status}'>{{text}}</p><p class='right'><i class='fa fa-check-circle-o' aria-hidden='true' @click='toggleStatus'></i><i class='fa fa-times-circle-o' aria-hidden='true' @click='removeTask'></i></p></div></transition>"
});
