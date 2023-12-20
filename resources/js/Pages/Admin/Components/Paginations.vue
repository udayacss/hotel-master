<template>
    <div class="row justify-content-between mt-3">
        <div id="user-list-page-info" class="col-md-6">
            <span
                >Showing {{ this.v_data?.from }} to {{ this.v_data?.to }} of
                {{ this.v_data?.total }} entries</span
            >
        </div>
        <div class="col-md-6">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end mb-0">
                    <li
                        class="page-item"
                        :class="{ disabled: !v_data?.prev_page_url }"
                    >
                        <Link
                            as="button"
                            method="get"
                            class="page-link"
                            :href="v_data?.prev_page_url"
                            tabindex="-1"
                            aria-disabled="true"
                            >Previous</Link
                        >
                    </li>
                    <li
                        class="page-item"
                        :class="{ active: currentPage(page) }"
                        v-for="(page, index) in v_data?.last_page"
                        :key="index"
                    >
                        <Link
                            as="button"
                            method="get"
                            class="page-link"
                            :href="v_data?.path + '?page=' + page"
                            >{{ page }}</Link
                        >
                    </li>

                    <li
                        class="page-item"
                        :class="{ disabled: !v_data?.next_page_url }"
                    >
                        <Link
                            as="button"
                            method="get"
                            class="page-link"
                            :href="v_data?.next_page_url"
                            >Next</Link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    props: {
        data: Object,
    },
    components: {
        Link,
    },
    data() {
        return {
            v_data: this.data,
        };
    },
    methods: {
        currentPage(page) {
            if (page == this.v_data?.current_page) {
                return true;
            }
        },
    },
};
</script>

<style></style>
