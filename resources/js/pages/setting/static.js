import {
    HeartIcon,
    BookOpenIcon,
    BookmarkSquareIcon,
} from "@heroicons/vue/24/outline";

export const APP_URL = import.meta.env.VITE_APP_URL;

export const options = [
    {
        value: 1,
        icon: BookOpenIcon,
        label: "Tampilkan Semua",
        summary:
            "Semua daftar masukan yang dikirim oleh tamu akan langsung ditampilkan kedalam monitor",
    },
    {
        value: 2,
        icon: HeartIcon,
        label: "Tampilkan Yang Dipilih",
        summary:
            "Hanya menampilkan daftar masukan yang telah dipilih atau diseleksi oleh tim atau panitia",
    },
];
