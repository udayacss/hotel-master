<template>
  <div>
    <!-- Sidebar  -->
    <div class="iq-sidebar">
      <div class="iq-navbar-logo d-flex justify-content-between">
        <a :href="route('admin.dashboard.index')" class="header-logo">
          <img :src="'/images/logo.png'" class="img-fluid rounded" alt="" />
          <span>CGF</span>
        </a>
        <div class="iq-menu-bt align-self-center">
          <div class="wrapper-menu">
            <div class="main-circle"><i class="ri-menu-line"></i></div>
            <div class="hover-circle"><i class="ri-close-fill"></i></div>
          </div>
        </div>
      </div>
      <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
            <li>
              <a
                href="#dashboard"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="true"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-home iq-arrow-left"></i><span>Dashboard</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="dashboard"
                class="iq-submenu collapse"
                data-parent="#iq-sidebar-toggle"
              >
                <li class="active">
                  <a href="index.html"
                    ><i class="las la-laptop-code"></i>Account Dashboard</a
                  >
                </li>
              </ul>
            </li>

            <li
              v-if="$page.props.user.permissions.includes('user.list')"
              :class="{ active: checkPath('/user') }"
            >
              <a
                href="#userinfo"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="false"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-user-tie iq-arrow-left"></i><span>User</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="userinfo"
                class="iq-submenu collapse"
                data-parent="#iq-sidebar-toggle"
                :class="{ show: checkPath('/user') }"
                style=""
              >
                <li v-if="$page.props.user.permissions.includes('user.update')">
                  <Link :href="route('admin.user.profile')"
                    ><i class="las la-id-card-alt"></i>User Profile</Link
                  >
                </li>
                <li>
                  <a href="profile-edit.html"
                    ><i class="las la-edit"></i>User Edit</a
                  >
                </li>
                <li v-if="$page.props.user.permissions.includes('user.create')">
                  <a href="add-user.html"
                    ><i class="las la-plus-circle"></i>User Add</a
                  >
                </li>
                <li v-if="$page.props.user.permissions.includes('user.list')">
                  <Link :href="route('admin.user.list')"
                    ><i class="las la-th-list"></i>User List</Link
                  >
                </li>
              </ul>
            </li>
            <li :class="{ active: checkPath('/branch') }">
              <a
                href="#branchinfo"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="false"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-user-tie iq-arrow-left"></i><span>Branch</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="branchinfo"
                class="iq-submenu collapse"
                :class="{ show: checkPath('/branch') }"
                data-parent="#iq-sidebar-toggle"
                style=""
              >
                <li :class="{ active: getIcon(route('admin.branch.create')) }">
                  <Link :href="route('admin.branch.create')"
                    ><i class="las la-id-card-alt"></i>Add Branch</Link
                  >
                </li>
                <li :class="{ active: getIcon(route('admin.branch.list')) }">
                  <Link :href="route('admin.branch.list')"
                    ><i class="las la-th-list"></i>Branch List</Link
                  >
                </li>
              </ul>
            </li>
            <li :class="{ active: checkPath('/center') }">
              <a
                href="#centerinfo"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="false"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-user-tie iq-arrow-left"></i><span>Center</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="centerinfo"
                class="iq-submenu collapse"
                data-parent="#iq-sidebar-toggle"
                :class="{ show: checkPath('/center') }"
                style=""
              >
                <li>
                  <Link :href="route('admin.center.list')"
                    ><i class="las la-id-card-alt"></i>Center List</Link
                  >
                </li>
                <li>
                  <Link :href="route('admin.center.create')"
                    ><i class="las la-id-card-alt"></i>Create New</Link
                  >
                </li>
              </ul>
            </li>
            <li>
              <a
                href="#Borrower"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="false"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-user-tie iq-arrow-left"></i
                ><span>Borrower</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="Borrower"
                class="iq-submenu collapse"
                data-parent="#iq-sidebar-toggle"
                style=""
              >
                <li>
                  <!-- <Link :href="route('admin.borrower.create')"
                    ><i class="las la-id-card-alt"></i>Create|Update</Link
                  > -->
                </li>
                <li>
                  <Link :href="route('admin.borrower.list')"
                    ><i class="las la-th-list"></i>List</Link
                  >
                </li>
              </ul>
            </li>

            <li>
              <a
                href="#loan"
                class="iq-waves-effect"
                data-toggle="collapse"
                aria-expanded="false"
                ><span class="ripple rippleEffect"></span
                ><i class="las la-laptop-code iq-arrow-left"></i
                ><span>Loan</span
                ><i class="ri-arrow-right-s-line iq-arrow-right"></i
              ></a>
              <ul
                id="loan"
                class="iq-submenu collapse"
                data-parent="#iq-sidebar-toggle"
                style=""
              >
                <li>
                  <Link :href="route('admin.loan.viewloan')"
                    ><i class="las la-th-list"></i>View All Loans</Link
                  >
                </li>
                <li>
                  <Link :href="route('admin.loan.addloan')"
                    ><i class="las la-id-card-alt"></i>Add Loan</Link
                  >
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="p-3"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
  components: {
    Link,
  },
  created() {
    //  console.log($page.props);
  },
  data() {
    return {
      routes: [
        {
          name: "user",
          permission: "user.list",
          path_name: "/user",
          icon: "",
          id: "#userinfo",
          sub: [
            {
              permission: "user.update",
              name: "User Profile",
              link: "admin.user.profile",
            },
            {
              permission: "user.update",
              name: "User Edit",
              link: "admin.user.profile",
            },
            {
              permission: "user.create",
              name: "User ADD",
              link: "admin.user.profile",
            },
            {
              permission: "user.list",
              name: "USER LIST",
              link: "admin.user.list",
            },
          ],
        },
        {
          name: "Branch",
          permission: "",
          path_name: "/branch",
          icon: "",
          id: "#branchinfo",
          sub: [
            {
              permission: "",
              name: "ADD",
              link: "admin.branch.create",
            },
            {
              permission: "",
              name: "LIST",
              link: "admin.branch.list",
            },
          ],
        },
        {
          name: "Center",
          permission: "",
          path_name: "/center",
          icon: "",
          id: "#centerinfo",
          sub: [
            {
              permission: "",
              name: "ADD",
              link: "admin.center.create",
            },
            {
              permission: "",
              name: "LIST",
              link: "admin.center.list",
            },
          ],
        },
      ],
    };
  },
  methods: {
    getIcon(route) {
      if (route == window.location.href) {
        return true;
      } else {
        return false;
      }
    },
    checkPath(path) {
      if (window.location.pathname.includes(path)) {
        return true;
      } else {
        return false;
      }
    },
  },
};
</script>
