<template>
  <TailwindPagination
      :data="pagination"
      @pagination-change-page="page"
  />
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name : "PaginateListComponent",
	props : {
		pagination : {type : Object},
	},
	methods: {
		page: function (page = 1) {
			this.method(page);
		}
	}
}
</script>