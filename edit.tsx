import InputError from '@/components/input-error';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectTrigger,
    SelectValue,
    SelectContent,
    SelectItem,
} from '@/components/ui/select';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { useEffect, useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Hhome',
        href: '/',
    },
    {
        title: 'Permissions',
        href: '/permissions',
    },
    {
        title: 'Edit',
        href: '/permissions/edit',
    },
];




interface LectTypeData {
    id: number;
    full_name: string;
}

interface GroupData {
    id: number;
    full_name: string;
}

interface Subject {
    id: number;
    full_name: string;
    teachers: Teacher[];
}

interface Teacher {
    id: number;
    teacher_name: string;
}

interface ProfYear {
    id: number;
    full_name: string;
    prof_year_subjects: Subject[];
}

interface ProfYearSession {
    id: number;
    start_date: string;
    end_date: string;
    prof_year: ProfYear;
}

interface AcadClassSchedule {
    id: number;
    class_date: string;
    start_time: string;
    end_time: string;
    prof_year_session_id: number;
    lecture_type_id: number;
    group_id: number;
    subject_id: number;
    teacher_id: number;
    class_topic: string;
    teaching_method: string;
    tools_used: string;
    assesment_method: string;
}

interface EditProps {
    acadClassSchedule: AcadClassSchedule;
    profYearSessions: ProfYearSession[];
    lectTypeDatas: LectTypeData[];
    groupDatas: GroupData[];

}






const Edit: React.FC<EditProps> = ({
    acadClassSchedule,
    profYearSessions,
    lectTypeDatas,
    groupDatas,

}) => {

    console.log(profYearSessions)

    const [selectedProfYearSession, setSelectedProfYearSession] = useState<ProfYearSession | null>(null);


    const { data, setData, errors, put, processing } = useForm({
        id: acadClassSchedule.id,
        class_date: acadClassSchedule.class_date.split('T')[0], // removes time if present,
        start_time: acadClassSchedule.start_time.slice(0, 5), // "14:30:00" -> "14:30"
        end_time: acadClassSchedule.end_time.slice(0, 5), // "14:30:00" -> "14:30"
        prof_year_session_id: String(acadClassSchedule.prof_year_session_id),
        lecture_type_id: String(acadClassSchedule.lecture_type_id),
        group_id: String(acadClassSchedule.group_id),
        subject_id: String(acadClassSchedule.subject_id),
        teacher_id: String(acadClassSchedule.teacher_id),
        class_topic: acadClassSchedule.class_topic,
        teaching_method: acadClassSchedule.teaching_method,
        tools_used: acadClassSchedule.tools_used,
        assesment_method: acadClassSchedule.assesment_method,
    });

    // Load initial selected session
    useEffect(() => {
        const found = profYearSessions.find(p => p.id === acadClassSchedule.prof_year_session_id);
        setSelectedProfYearSession(found ?? null);
    }, [acadClassSchedule.prof_year_session_id, profYearSessions]);

    const filteredSubjects = selectedProfYearSession?.prof_year.prof_year_subjects ?? [];
    const filteredTeachers = filteredSubjects.find(s => s.id === Number(data.subject_id))?.teachers ?? [];

    const handleSubmit: React.FormEventHandler<HTMLFormElement> = (e) => {
        e.preventDefault();

        put(route("acadClassSchedules.update", acadClassSchedule.id));
    };

    console.log(data)



    return (

        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Permissions Create" />

            <div className="flex items-center justify-between mb-6">
                <Link
                    className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                    href={route("acadClassSchedules.index")}
                >
                    Back acadClassSchedules
                </Link>
            </div>

            <form name="createForm" onSubmit={handleSubmit} noValidate>
                <div className="flex flex-col">
                    {/* class_date */}
                    <div className="grid gap-2">
                        <Label htmlFor="class_date">Class Date</Label>
                        <Input
                            id="class_date"
                            type="date"
                            required
                            autoFocus
                            tabIndex={1}
                            autoComplete="class_date"
                            value={data.class_date}
                            onChange={(e) => setData('class_date', e.target.value)}
                            disabled={processing}
                            placeholder="Full name"
                        />
                        <InputError message={errors.class_date} className="mt-2" />
                    </div>
                    {/* start_time */}
                    <div className="grid gap-2">
                        <Label htmlFor="start_time">Start Time</Label>
                        <Input
                            id="start_time"
                            type="time"
                            required
                            value={data.start_time}
                            onChange={(e) => setData('start_time', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.start_time} />
                    </div>

                    {/* end_time */}
                    <div className="grid gap-2">
                        <Label htmlFor="end_time">End Time</Label>
                        <Input
                            id="end_time"
                            type="time"
                            required
                            value={data.end_time}
                            onChange={(e) => setData('end_time', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.end_time} />
                    </div>

                    {/* prof_year_session_id */}
                    <div className="grid gap-2">
                        <Label>Prof Year Session</Label>
                        <Select
                            value={data.prof_year_session_id}
                            onValueChange={(val) => {
                                setData('prof_year_session_id', val);
                                const found = profYearSessions.find(p => p.id === Number(val));
                                setSelectedProfYearSession(found ?? null);
                                setData('subject_id', '');
                                setData('teacher_id', '');
                            }}
                        >
                            <SelectTrigger><SelectValue placeholder="Select session" /></SelectTrigger>
                            <SelectContent>
                                {profYearSessions.map((s) => (
                                    <SelectItem key={s.id} value={String(s.id)}>
                                        {s.prof_year.full_name} ({s.start_date} - {s.end_date})
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.prof_year_session_id} />
                    </div>

                    {/* lecture_type_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="lecture_type_id">Teacher's Gender</Label>
                        <Select
                            value={String(data.lecture_type_id)}
                            onValueChange={(value) => setData("lecture_type_id", value)}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select gender" />
                            </SelectTrigger>
                            <SelectContent>
                                {lectTypeDatas.map((lectureType) => (
                                    <SelectItem key={lectureType.id} value={String(lectureType.id)}>
                                        {lectureType.full_name}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.lecture_type_id} />
                    </div>

                    {/* group_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="group_id">Group</Label>
                        <Select
                            value={String(data.group_id)}
                            onValueChange={(value) => setData('group_id', value)}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select group" />
                            </SelectTrigger>
                            <SelectContent>
                                {groupDatas.map((group) => (
                                    <SelectItem key={group.id} value={String(group.id)}>
                                        {group.full_name}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.group_id} />
                    </div>
                    {/* subject_id */}
                    <div className="grid gap-2">
                        <Label>Subject</Label>
                        <Select
                            value={data.subject_id}
                            onValueChange={(val) => {
                                setData('subject_id', val);
                                setData('teacher_id', '');
                            }}
                        >
                            <SelectTrigger><SelectValue placeholder="Select subject" /></SelectTrigger>
                            <SelectContent>
                                {filteredSubjects.length > 0 ? (
                                    filteredSubjects.map((subj) => (
                                        <SelectItem key={subj.id} value={String(subj.id)}>
                                            {subj.full_name}
                                        </SelectItem>
                                    ))
                                ) : (
                                    <SelectItem disabled value="no-subjects">No subjects available</SelectItem>
                                )}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.subject_id} />
                    </div>
                    {/* teacher_id */}
                    <div className="grid gap-2">
                        <Label>Teacher</Label>
                        <Select
                            value={data.teacher_id}
                            onValueChange={(val) => setData('teacher_id', val)}
                            disabled={!data.subject_id}
                        >
                            <SelectTrigger><SelectValue placeholder="Select teacher" /></SelectTrigger>
                            <SelectContent>
                                {filteredTeachers.length > 0 ? (
                                    filteredTeachers.map((t) => (
                                        <SelectItem key={t.id} value={String(t.id)}>
                                            {t.teacher_name}
                                        </SelectItem>
                                    ))
                                ) : (
                                    <SelectItem disabled value="no-teacher">No teachers available</SelectItem>
                                )}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.teacher_id} />
                    </div>
                    {/* class_topic */}
                    <div className="grid gap-2">
                        <Label htmlFor="class_topic">Class Topic</Label>
                        <Input
                            id="class_topic"
                            type="text"
                            value={data.class_topic}
                            onChange={(e) => setData('class_topic', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.class_topic} />
                    </div>
                    {/* teaching_method */}
                    <div className="grid gap-2">
                        <Label htmlFor="teaching_method">Teaching Method</Label>
                        <Input
                            id="teaching_method"
                            type="text"
                            value={data.teaching_method}
                            onChange={(e) => setData('teaching_method', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.teaching_method} />
                    </div>
                    {/* tools_used */}
                    <div className="grid gap-2">
                        <Label htmlFor="tools_used">Tools Used</Label>
                        <Input
                            id="tools_used"
                            type="text"
                            value={data.tools_used}
                            onChange={(e) => setData('tools_used', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.tools_used} />
                    </div>
                    {/* assesment_method */}
                    <div className="grid gap-2">
                        <Label htmlFor="tools_used">Assesment Method</Label>
                        <Input
                            id="assesment_method"
                            type="text"
                            value={data.assesment_method}
                            onChange={(e) => setData('assesment_method', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.assesment_method} />
                    </div>








                </div>


                <div className="mt-4">
                    <button
                        type="submit"
                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                    >
                        Save
                    </button>
                </div>
            </form>















        </AppLayout>
    );
};


export default Edit;






