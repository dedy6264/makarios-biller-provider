
import { ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';

export function saving(modalMsaHome) {
    const isSavingPage = ref(false);//variable const ... ;
    const modalSavingPage = () => {
        modalMsaHome.value = false;
        isSavingPage.value = true;
    }
    const closeSavingPage = () => {
        isSavingPage.value = false;
        isSavingDepositPage.value = false;
        msaHome();
    }
    // Kembalikan semua yang ingin dipakai di file HTML/Vue
    return {
        isSavingPage,
        modalSavingPage,
    };
}
