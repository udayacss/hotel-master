import moment from "moment";

export function formatDate(date) {
    const formattedDate = moment(date).format("YYYY/MM/DD");
    return formattedDate; //20171019
}
