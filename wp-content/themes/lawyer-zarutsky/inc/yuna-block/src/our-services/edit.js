/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEffect, useState } from "@wordpress/element";

// беремо enum прямо з block.json
import metadata from './block.json';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
/*import '../main-block/editor.scss';*/

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { blockTitle, callTitle, callText, anchorId, topIndent, bottomIndent, btnText, btnAnchor, btnColor, pageId} = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});


	// Отримуємо enum bottomIndent з block.json
	const bottomIndentOptions = metadata.attributes.bottomIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum topIndent з block.json
	const topIndentOptions = metadata.attributes.topIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum btnColor з block.json
	const btnColorOptions = metadata.attributes.btnColor.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо сторінку послуг
	const pagesList = useSelect(
		(select) => select('core').getEntityRecords('postType', 'page', { per_page: -1 }),
		[]
	);

	const pagesListOptions = pagesList
		? pagesList.map((page) => ({ label: page.title.rendered, value: page.id }))
		: [];

	pagesListOptions.unshift({ label: __('Виберіть сторінку послуг', ), value: 0 });


	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >

					<TextControl
						label={'Якір блоку'}
						help={'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо'}
						value={ anchorId || ''}
						onChange={ (value)=> setAttributes({ anchorId: value })}
					/>
					<SelectControl
						label={__('Верхній внутрішній відступ')}
						value={topIndent}
						options={topIndentOptions}
						onChange={(value) => setAttributes({ topIndent: value })}
					/>

					<SelectControl
						label={__('Нижній внутрішній відступ')}
						value={bottomIndent}
						options={bottomIndentOptions}
						onChange={(value) => setAttributes({ bottomIndent: value })}
					/>

					<SelectControl
						label={__('Оберіть сторінкуг послуг')}
						value={pageId}
						options={pagesListOptions}
						onChange={(value) => setAttributes({ pageId: parseInt(value) })}
					/>

				</PanelBody>
				<PanelBody title={'Кнопка'}  >
					<SelectControl
						label={__('Колір кнопки')}
						value={btnColor}
						options={btnColorOptions}
						onChange={(value) => setAttributes({ btnColor: value })}
					/>

					<TextControl
						label={'ID якоря'}
						help={'ID блоку чи модального вікна на які має вести кнопка. Модальне вікно: formModal. Контактна форма: contact-form'}
						value={ btnAnchor || ''}
						onChange={ (value)=> setAttributes({ btnAnchor: value })}
					/>

					<TextControl
						label={'Текст кнопки'}
						value={ btnText || ''}
						onChange={ (value)=> setAttributes({ btnText: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<RichText
							tagName="h2"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="h3"
							className={'call-title'}
							value={ attributes.callTitle }
							placeholder={'Заголовок заклику зваʼязатись якщо нічого не підходить'}
							onChange={ (value)=>setAttributes({ callTitle: value })}
							allowedFormats={ [ 'core/bold', 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'call-text'}
							value={ attributes.callText }
							placeholder={'Текст заклику зваʼязатись якщо нічого не підходить'}
							onChange={ (value)=>setAttributes({ callText: value })}
							allowedFormats={ [ 'core/bold', ['core/link'], 'core/text-color' ] }
						/>
					</div>
				</div>
			</section>
		</>
	);
}
