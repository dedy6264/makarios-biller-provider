
window.format = {
    cekasu() {
        return `asuuuuuu`
    },
    formatTanggal(isoString) {
        const date = new Date(isoString)
        const optionsDate = {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }
        const optionsTime = {
            hour: '2-digit',
            minute: '2-digit',
            // second: '2-digit',
            hour12: false
        }
        const tanggal = date.toLocaleDateString('id-ID', optionsDate)
        const waktu = date.toLocaleTimeString('id-ID', optionsTime)
        return `${tanggal} | ${waktu} WIB`
    },

    formatCurrency(value) {
        if (!value) return 'Rp 0'

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value)
    }
}