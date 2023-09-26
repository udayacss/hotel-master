<template>
  <div class="row">
    <div class="col-sm-12">
      <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
            <h4 class="card-title">{{ v_name }}</h4>
          </div>
        </div>
        <div class="iq-card-body">
          <div class="table-responsive">
            <div class="row justify-content-between">
              <div class="col-sm-12 col-md-6">
                <div id="user_list_datatable_info" class="dataTables_filter">
                  <form class="mr-3 position-relative">
                    <div class="form-group mb-0">
                      <input
                        type="search"
                        class="form-control"
                        id="exampleInputSearch"
                        placeholder="Search"
                        aria-controls="user-list-table"
                      />
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="user-list-files d-flex float-right">
                  <a class="iq-bg-primary" href="javascript:void();"> Print </a>
                  <a class="iq-bg-primary" href="javascript:void();"> Excel </a>
                  <a class="iq-bg-primary" href="javascript:void();"> Pdf </a>
                </div>
              </div>
            </div>
            <table
              id="user-list-table"
              class="table table-striped table-bordered mt-4"
              role="grid"
              aria-describedby="user-list-page-info"
            >
              <thead>
                <tr>
                  <th v-for="(col, col_index) in v_colums" :key="col_index">
                    {{ col.title }}
                  </th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(r_data, index) in v_data.data" :key="index">
                  <td v-for="(col, col_index) in v_colums" :key="col_index">
                    {{ showData(r_data, col.column) }}
                  </td>

                  <td>
                    <div class="flex align-items-center list-user-action">
                      <a
                        v-for="(action, index) in v_actions"
                        :key="index"
                        class="iq-bg-primary"
                        data-toggle="tooltip"
                        data-placement="top"
                        title=""
                        :data-original-title="action.type"
                        @click="callFunction(action, r_data.id)"
                        ><i :class="action.icon"></i
                      ></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row justify-content-between mt-3">
            <div id="user-list-page-info" class="col-md-6">
              <span
                >Showing {{ v_data.current_page * v_data.per_page }} to
                {{ v_data.last_page * v_data.per_page }} of
                {{ v_data.last_page * v_data.per_page }} entries</span
              >
            </div>
            <div class="col-md-6">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end mb-0">
                  <div v-for="(link, index) in v_data.links" :key="index">
                    <Link
                      method="get"
                      as="button"
                      class="page-item btn"
                      :class="{ active: link.active }"
                      :href="link.url"
                      v-if="Number(link.label)"
                    >
                      <a class="page-link">{{ link.label }}</a>
                    </Link>
                  </div>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

export default {
  components: {
    Link,
  },
  props: {
    name: String,
    data: Object,
    colums: Array,
    columns_db: Array,
    actions: Array,
  },
  data() {
    return {
      v_name: this.name,
      v_data: this.data,
      v_colums: this.colums,
      v_columns_db: this.columns_db,
      v_actions: this.actions,
    };
  },
  methods: {
    showData(data, columns) {
      if (columns.length == 1) {
        return data[columns[0]];
      } else if (columns.length == 2) {
        return data[columns[0]][columns[1]];
      }
    },
    callFunction(action, id) {
      switch (action.type) {
        case "edit":
          this.editData(action.url, id);
          break;
        case "delete":
          this.deleteData();
          break;
      }
    },
    editData(url, id) {
      let new_url = route(url, id);
      return router.get(new_url);
    },
  },
};
</script>

<style>
</style>