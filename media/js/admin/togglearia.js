(() => {
    const toggleSelector = 'input[name="jform[params][enable_aria_label]"]';

    const getFieldContainer = (input) =>
        input.closest('.control-group, .mb-3, .control, .field-entry, .field-spacer') || input.parentElement;

    const updateAriaLabelVisibility = () => {
        const active = document.querySelector(`${toggleSelector}:checked`);
        const enabled = active && active.value === '1';

        document.querySelectorAll('input[name$="[aria_label]"]').forEach((input) => {
            const container = getFieldContainer(input);

            if (container) {
                container.style.display = enabled ? '' : 'none';
            }
        });
    };

    const bindToggleEvents = () => {
        document.querySelectorAll(toggleSelector).forEach((el) => {
            el.addEventListener('change', updateAriaLabelVisibility);
        });
    };

    document.addEventListener('DOMContentLoaded', () => {
        bindToggleEvents();
        updateAriaLabelVisibility();

        document.addEventListener('subform-row-add', () => {
            updateAriaLabelVisibility();
        });
    });
})();

