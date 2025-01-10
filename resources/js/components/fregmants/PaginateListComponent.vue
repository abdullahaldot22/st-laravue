<template>
  	<TailwindPagination
      	:data="pagination"
	  	:keepLength="true"
	  	:limit="1"
		:item-classes="classes"
		:active-classes="activeClass"
      	@pagination-change-page="page"
  	/>
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name : "PaginateListComponent",
	data () {
		return {
			classes : ['!hover:cursor-pointer', 'rounded-lg', 'mx-0.5'],
			activeClass : ['bg-gray-800', 'text-white', 'rounded-lg'],
		}
	},
	components: {
		TailwindPagination
	},
	props : {
		pagination : {type : Object},
		method: {type: Function}
	},
	methods: {
		page: function (page = 1) {
			this.method(page);
		}
	}
}
</script>