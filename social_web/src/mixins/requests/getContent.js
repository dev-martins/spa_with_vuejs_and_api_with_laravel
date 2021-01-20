export default {
    methods: {
        getContent() {
            this.$http
                .get(`${this.$ApiUrl}api/v1/users/content`, {
                    headers: {
                        Accept: "application/json",
                        Authorization: `Bearer ${this.token}`,
                        "Content-Type": "application/json",
                    },
                })
                .then((response) => {
                    this.$store.commit("setContent", response.data.content);
                    this.contents = this.$store.getters.getContent;
                    this.userImage = response.data.image;
                    this.userName = response.data.name;
                })
                .catch((e) => {
                    let resp = e.response.data.errors;
                    for (let key in resp) {
                        Vue.$toast.open({
                            message: resp[key],
                            type: "error",
                            position: "top-right",
                        });
                    }
                });
        },
    },
}