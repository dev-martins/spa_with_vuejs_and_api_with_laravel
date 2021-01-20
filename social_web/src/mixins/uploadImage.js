export default {
    methods: {
        uploadImage(e) {
            const image = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = (e) => {
                this.imagePreview = e.target.result;
            };
        },
    },
}