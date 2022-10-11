import { id } from "date-fns/locale";
import { differenceInDays, format, formatDistanceStrict } from "date-fns";

export function formateDate(date, formatType = "yyyy-MM-dd") {
    const newDate = new Date(date);

    return format(newDate, formatType, { locale: id });
}

export function shortTimestamp(date, formatType = "EEEE, dd MMMM yyyy") {
    const articleDate = new Date(date);
    const todayDate = new Date();

    if (differenceInDays(todayDate, articleDate) > 6) {
        return format(articleDate, formatType, { locale: id });
    }

    return formatDistanceStrict(articleDate, todayDate, {
        locale: id,
        addSuffix: true,
    });
}

export function formatNumber(number, options = {}) {
    return new Intl.NumberFormat("id-ID", options).format(number);
}
