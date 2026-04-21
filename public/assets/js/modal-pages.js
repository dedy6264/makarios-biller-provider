
import { ref } from 'vue';

export function useTransaction() {
    const isModalInquiry = ref(false);
    const dataBalance = ref(0);
    const token = ref(null);

    const navigateTo = () => {
        console.log("Navigating...");
        // Logika navigasi Anda
    };

    const isConfirm = async () => {
        // Logika hit API Laravel Anda yang tadi
    };

    // Kembalikan semua yang ingin dipakai di file HTML/Vue
    return {
        isModalInquiry,
        dataBalance,
        token,
        navigateTo,
        isConfirm
    };
}