<template>
  <AppLayout>
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="iq-card">
              <div class="iq-card-body p-0">
                <div class="iq-edit-list">
                  <ul class="iq-edit-profile d-flex nav nav-pills">
                    <li class="col-md-3 p-0">
                      <a
                        class="nav-link active"
                        data-toggle="pill"
                        href="#branch-import"
                      >
                        Branch
                      </a>
                    </li>
                    <li class="col-md-3 p-0">
                      <a
                        class="nav-link"
                        data-toggle="pill"
                        href="#center-import"
                      >
                        Center
                      </a>
                    </li>
                    <li class="col-md-3 p-0">
                      <a
                        class="nav-link"
                        data-toggle="pill"
                        href="#member-import"
                      >
                        Member
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="iq-edit-list-data">
              <div class="tab-content">
                <div
                  class="tab-pane fade active show"
                  id="branch-import"
                  role="tabpanel"
                >
                  <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                        <h4 class="card-title">Branch Import</h4>
                      </div>
                    </div>
                    <div class="iq-card-body">
                      <form>
                        <div class="row align-items-center">
                          <div class="form-group col-sm-6">
                            <label for="fname">Choose File:</label>

                            <div class="custom-file">
                              <input
                                type="file"
                                class="custom-file-input"
                                @input="
                                  branch_form.file = $event.target.files[0]
                                "
                              />
                              <label class="custom-file-label" for="customFile"
                                >Choose file</label
                              >
                              <progress
                                v-if="branch_form.progress"
                                :value="branch_form.progress.percentage"
                                max="100"
                              >
                                {{ branch_form.progress.percentage }}%
                              </progress>
                            </div>
                          </div>
                        </div>
                        <button
                          type="button"
                          class="btn btn-primary mr-2"
                          @click="importBranch()"
                        >
                          IMPORT
                        </button>
                        <button type="reset" class="btn iq-bg-danger">
                          CANSEL
                        </button>
                        <button type="reset" class="btn iq-bg-danger ml-2">
                          DOWNLOAD SAMPLE
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade "
                  id="center-import"
                  role="tabpanel"
                >
                  <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                        <h4 class="card-title">Center Import</h4>
                      </div>
                    </div>
                    <div class="iq-card-body">
                      <form>
                        <div class="row align-items-center">
                          <div class="form-group col-sm-6">
                            <label for="fname">Choose File:</label>

                            <div class="custom-file">
                              <input
                                type="file"
                                class="custom-file-input"
                                @input="
                                  center_form.file = $event.target.files[0]
                                "
                              />
                              <label class="custom-file-label" for="customFile"
                                >Choose file</label
                              >
                              <progress
                                v-if="center_form.progress"
                                :value="center_form.progress.percentage"
                                max="100"
                              >
                                {{ center_form.progress.percentage }}%
                              </progress>
                            </div>
                          </div>
                        </div>
                        <button
                          type="button"
                          class="btn btn-primary mr-2"
                          @click="importCenter()"
                        >
                          IMPORT
                        </button>
                        <button type="reset" class="btn iq-bg-danger">
                          CANSEL
                        </button>
                        <button type="reset" class="btn iq-bg-danger ml-2">
                          DOWNLOAD SAMPLE
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade "
                  id="member-import"
                  role="tabpanel"
                >
                  <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                        <h4 class="card-title">Member Import</h4>
                      </div>
                    </div>
                    <div class="iq-card-body">
                      <form>
                        <div class="row align-items-center">
                          <div class="form-group col-sm-6">
                            <label for="fname">Choose File:</label>

                            <div class="custom-file">
                              <input
                                type="file"
                                class="custom-file-input"
                                @input="
                                  member_form.file = $event.target.files[0]
                                "
                              />
                              <label class="custom-file-label" for="customFile"
                                >Choose file</label
                              >
                              <progress
                                v-if="member_form.progress"
                                :value="member_form.progress.percentage"
                                max="100"
                              >
                                {{ member_form.progress.percentage }}%
                              </progress>
                            </div>
                          </div>
                        </div>
                        <button
                          type="button"
                          class="btn btn-primary mr-2"
                          @click="importMember()"
                        >
                          IMPORT
                        </button>
                        <button type="reset" class="btn iq-bg-danger">
                          CANSEL
                        </button>
                        <button type="reset" class="btn iq-bg-danger ml-2">
                          DOWNLOAD SAMPLE
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

export default {
  components: {
    AppLayout,
  },
  data() {
    return {
      branch_form: useForm({
        file: null,
      }),
      center_form: useForm({
        file: null,
      }),
      member_form: useForm({
        file: null,
      }),
    };
  },
  methods: {
    importBranch() {
      this.branch_form.post(route("admin.import.branches"));
    },
    importCenter() {
      this.center_form.post(route("admin.import.centers"));
    },
    importMember() {
      this.member_form.post(route("admin.import.members"));
    },
  },
};
</script>

<style>
</style>