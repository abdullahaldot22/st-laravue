<template>
  <TailwindPagination
      :data="pagination"
	  :keepLength="true"
	  :limit="1"
      @pagination-change-page="page"
  />
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name : "PaginateListComponent",
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