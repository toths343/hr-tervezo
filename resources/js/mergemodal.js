export function openMergeModal() {
    const mergeModalElement = document.getElementById('merge-modal');
    mergeModalElement.addEventListener('shown.bs.modal', event => {
        console.log('ajax here');
    })

    const mergeModal = new bootstrap.Modal('.merge-modal', {});
    mergeModal.show();
}
