export default {
    methods: {
        convertDateTime(dateTime) {
            let options = {
                year: "numeric",
                month: "numeric",
                day: "numeric",
                hour: "numeric",
                minute: "numeric",
                second: "numeric",
                hour12: false,
                timeZone: "America/Sao_Paulo",
            };

            dateTime = dateTime
                .replace(" ", "-")
                .replace(":", "-")
                .replace(":", "-")
                .replace("T", "-")
                .replace(".", "-");
            var arr = dateTime.split("-");
            dateTime = new Intl.DateTimeFormat("default", options).format(
                new Date(arr[0], arr[1] - 1, arr[2], arr[3], arr[4], arr[5])
            );
            return dateTime;
        }
    },
}