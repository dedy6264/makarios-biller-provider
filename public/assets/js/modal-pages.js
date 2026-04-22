
import { ref } from 'vue';

export function navigation() {
    const navigateTo = () => {//cek session to redirect navigate
        switch (navigate) {
            case 'msaProfile':
                msaProfile();
                break;
            case 'msaTransactions':
                msaTransactions();
                break;
            // case 'msaProduct':
            // msaTransactions();
            // break;
            default:
                msaHome();
                break;
        }
    };
    // Kembalikan semua yang ingin dipakai di file HTML/Vue
    return {
        navigateTo,
    };
}