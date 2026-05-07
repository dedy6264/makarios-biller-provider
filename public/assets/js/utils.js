
window.format = {

    formatTanggal(isoString) {
        console.log('RAW:', isoString)

        const date = new Date(isoString)
        console.log('PARSED:', date)


        const optionsDate = {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        }

        const optionsTime = {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false,
            timeZone: 'Asia/Jakarta'
        }
        const tanggal = date.toLocaleDateString('id-ID', optionsDate)
        const waktu = date.toLocaleTimeString('id-ID', optionsTime)
        return `${tanggal} | ${waktu} WIB`
    },

    formatCurrency(value) {
        if (!value) return 'Rp0'

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value)
    }
}