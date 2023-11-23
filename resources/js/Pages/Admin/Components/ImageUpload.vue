<template>
    <label for="fname">{{ v_lable_name }}:</label>
    <div class="form-group col-sm-6">
        <div class="custom-file">
            <form enctype="multipart/form-data">
                <input
                    type="file"
                    class="custom-file-input"
                    id="customFile"
                    @change="onImageChange"
                />
            </form>
            <label class="custom-file-label" for="customFile"
                >{{ file_name ? file_name : "Choose file" }}
            </label>
            <button
                class="btn btn-danger"
                v-if="file_name"
                @click="deleteImage"
                type="button"
            >
                x
            </button>
        </div>
        <div v-if="success != ''" class="alert alert-success" role="alert">
            {{ success }}
        </div>
        <div v-if="error && !success" class="alert alert-danger" role="alert">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        lable_name: String,
        model_name: String,
        folder_name: String,
        image_link: String,
        error: String,
    },
    emits: ["setImageUrl"],
    data() {
        return {
            v_lable_name: this.lable_name,
            v_folder_name: this.folder_name,
            v_image_link: this.image_link,
            file_name: "",
            image: "",
            success: "",
            v_error: this.error,
        };
    },
    mounted() {
        if (this.image_link) {
            this.file_name = this.getNameByLink(this.image_link);
        }
    },
    methods: {
        onImageChange(e) {
            this.image = e.target.files[0];
            this.formSubmit();
        },
        getNameByLink(link) {
            return link;
        },
        async formSubmit() {
            let currentObj = this;

            const config = {
                headers: { "content-type": "multipart/form-data" },
            };

            let formData = new FormData();
            formData.append("image", this.image);
            formData.append("folder", this.v_folder_name);
            let url = "";
            await axios
                .post(route("admin.image.upload"), formData, config)
                .then(function (response) {
                    url = response.data.url;
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    console.log(error);
                    currentObj.output = error;
                });

            this.file_name = this.image.name;
            this.v_image_link = url;
            this.$emit("setImageUrl", url);
        },

        async deleteImage() {
            let currentObj = this;
            await axios
                .get(
                    route("admin.image.delete") +
                        "?path=" +
                        currentObj.v_image_link
                )
                .then(function (response) {
                    // currentObj.file_name = "";
                })
                .catch(function (error) {
                    console.log(error);
                    // currentObj.output = error;
                });

            this.file_name = "";
            this.success = "";
            this.$emit("setImageUrl", "");
        },
    },
};
</script>

<style></style>
